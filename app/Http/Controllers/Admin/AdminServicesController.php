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

    public function create(): View
    {
        return view('admin.service-create');
    }

    public function editOne(int $index): View
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        abort_unless(isset($services[$index]), 404);

        return view('admin.service-edit', [
            'index' => $index,
            'service' => $services[$index],
        ]);
    }

    public function update(Request $request, int $index): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        abort_unless(isset($services[$index]), 404);

        $validated = $this->validateService($request);

        $services[$index] = $this->buildService($validated, (string) $services[$index]['slug']);

        ConfigWriter::write('services', ['services' => $services]);

        return redirect()->route('admin.services.edit')->with('status', 'Layanan disimpan.');
    }

    public function store(Request $request): RedirectResponse
    {
        $services = ConfigWriter::read('services')['services'] ?? [];

        $validated = $this->validateService($request);

        $slug = self::uniqueSlug(
            (string) ($request->input('slug') ?: 'layanan-'.(count($services) + 1)),
            $services
        );

        $services[] = $this->buildService($validated, $slug);

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
     * @return array<string, mixed>
     */
    private function validateService(Request $request): array
    {
        $request->validate([
            'slug' => ['nullable', 'string', 'max:50'],
            'title' => ['required', 'string', 'max:100'],
            'short' => ['required', 'string', 'max:200'],
            'description' => ['required', 'string', 'max:500'],
            'items_text' => ['required', 'string', 'max:2000'],
            'for_text' => ['required', 'string', 'max:2000'],
            'pricing.label' => ['nullable', 'string', 'max:50'],
            'pricing.tiers' => ['required', 'array', 'min:1'],
            'pricing.tiers.*.name' => ['required', 'string', 'max:80'],
            'pricing.tiers.*.price' => ['required', 'string', 'max:40'],
            'pricing.tiers.*.note' => ['nullable', 'string', 'max:150'],
        ]);

        return $request->all();
    }

    /**
     * @param  array<string, mixed>  $input
     * @return array<string, mixed>
     */
    private function buildService(array $input, string $slug): array
    {
        return [
            'slug' => $slug,
            'title' => (string) $input['title'],
            'short' => (string) $input['short'],
            'description' => (string) $input['description'],
            'for' => self::splitLines((string) ($input['for_text'] ?? '')),
            'items' => self::splitLines((string) ($input['items_text'] ?? '')),
            'pricing' => [
                'label' => ((string) ($input['pricing']['label'] ?? '')) !== '' ? (string) $input['pricing']['label'] : 'Mulai dari',
                'tiers' => array_map(fn (array $tier): array => [
                    'name' => (string) $tier['name'],
                    'price' => (string) $tier['price'],
                    'note' => (string) ($tier['note'] ?? ''),
                ], $input['pricing']['tiers'] ?? []),
            ],
        ];
    }

    /**
     * @param  array<int, array<string, mixed>>  $services
     */
    private static function uniqueSlug(string $slug, array $services): string
    {
        $slug = strtolower(trim(preg_replace('/[^a-z0-9\-]+/i', '-', $slug), '-'));

        if ($slug === '') {
            $slug = 'layanan-baru';
        }

        $base = $slug;
        $suffix = 1;

        while (in_array($slug, array_column($services, 'slug'), true)) {
            $suffix++;
            $slug = $base.'-'.$suffix;
        }

        return $slug;
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
