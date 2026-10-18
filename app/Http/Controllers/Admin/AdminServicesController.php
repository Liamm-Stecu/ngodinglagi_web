<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ConfigWriter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminServicesController extends Controller
{
    public function edit(): View
    {
        return view('admin.services', [
            'services' => ConfigWriter::read('services')['services'] ?? [],
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'services' => ['required', 'array', 'min:1'],
            'services.*.slug' => ['required', 'string', 'max:50'],
            'services.*.title' => ['required', 'string', 'max:100'],
            'services.*.short' => ['required', 'string', 'max:200'],
            'services.*.description' => ['required', 'string', 'max:500'],
            'services.*.items_text' => ['required', 'string', 'max:2000'],
            'services.*.for_text' => ['required', 'string', 'max:2000'],
            'services.*.pricing.label' => ['nullable', 'string', 'max:50'],
            'services.*.pricing.tiers' => ['required', 'array', 'min:1'],
            'services.*.pricing.tiers.*.name' => ['required', 'string', 'max:80'],
            'services.*.pricing.tiers.*.price' => ['required', 'string', 'max:40'],
            'services.*.pricing.tiers.*.note' => ['nullable', 'string', 'max:150'],
        ]);

        $services = [];

        foreach ($request->input('services', []) as $service) {
            $services[] = [
                'slug' => $service['slug'],
                'title' => $service['title'],
                'short' => $service['short'],
                'description' => $service['description'],
                'for' => self::splitLines($service['for_text'] ?? ''),
                'items' => self::splitLines($service['items_text'] ?? ''),
                'pricing' => [
                    'label' => $service['pricing']['label'] ?? 'Mulai dari',
                    'tiers' => array_map(fn (array $tier): array => [
                        'name' => (string) $tier['name'],
                        'price' => (string) $tier['price'],
                        'note' => (string) ($tier['note'] ?? ''),
                    ], $service['pricing']['tiers'] ?? []),
                ],
            ];
        }

        ConfigWriter::write('services', ['services' => $services]);

        return redirect()->route('admin.services.edit')->with('status', 'Layanan disimpan.');
    }

    public function store(): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];
        $index = count($services) + 1;

        $services[] = [
            'slug' => 'layanan-'.$index,
            'title' => 'Layanan Baru '.$index,
            'short' => 'Deskripsi singkat layanan.',
            'description' => 'Deskripsi lengkap layanan ini.',
            'for' => ['Kebutuhan 1'],
            'items' => ['Cakupan kerja 1'],
            'pricing' => [
                'label' => 'Mulai dari',
                'tiers' => [
                    ['name' => 'Paket A', 'price' => 'Rp 0', 'note' => 'Catatan paket'],
                ],
            ],
        ];

        ConfigWriter::write('services', ['services' => $services]);

        return redirect()->route('admin.services.edit')->with('status', 'Layanan ditambahkan.');
    }

    public function destroy(int $index): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        if (count($services) <= 1 || ! isset($services[$index])) {
            return redirect()->route('admin.services.edit')->with('status', 'Minimal harus ada satu layanan.');
        }

        unset($services[$index]);

        ConfigWriter::write('services', ['services' => array_values($services)]);

        return redirect()->route('admin.services.edit')->with('status', 'Layanan dihapus.');
    }

    public function storeTier(int $index): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        if (! isset($services[$index])) {
            return redirect()->route('admin.services.edit');
        }

        $services[$index]['pricing']['tiers'][] = [
            'name' => 'Paket Baru',
            'price' => 'Rp 0',
            'note' => '',
        ];

        ConfigWriter::write('services', ['services' => $services]);

        return redirect()->route('admin.services.edit')->with('status', 'Tier harga ditambahkan.');
    }

    public function destroyTier(int $index, int $tierIndex): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        if (! isset($services[$index])) {
            return redirect()->route('admin.services.edit');
        }

        $tiers = $services[$index]['pricing']['tiers'] ?? [];

        if (count($tiers) <= 1 || ! isset($tiers[$tierIndex])) {
            return redirect()->route('admin.services.edit')->with('status', 'Minimal harus ada satu tier.');
        }

        unset($tiers[$tierIndex]);
        $services[$index]['pricing']['tiers'] = array_values($tiers);

        ConfigWriter::write('services', ['services' => $services]);

        return redirect()->route('admin.services.edit')->with('status', 'Tier harga dihapus.');
    }

    /**
     * @return list<string>
     */
    private static function splitLines(string $value): array
    {
        return array_values(array_filter(array_map(
            static fn (string $line): string => trim($line),
            preg_split('/\r\n|\r|\n/', $value) ?: []
        )));
    }
}
