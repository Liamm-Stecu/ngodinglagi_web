<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ConfigWriter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPortfolioController extends Controller
{
    public function edit(): View
    {
        return view('admin.portfolio', [
            'portfolio' => ConfigWriter::read('portfolio'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $request->validate([
            'stats.samp' => ['required', 'integer', 'min:0'],
            'stats.web' => ['required', 'integer', 'min:0'],
            'stats.editing' => ['required', 'integer', 'min:0'],
            'categories' => ['required', 'array', 'min:1'],
            'categories.*.slug' => ['required', 'string', 'max:50'],
            'categories.*.title' => ['required', 'string', 'max:100'],
            'categories.*.description' => ['required', 'string', 'max:300'],
            'categories.*.items_text' => ['required', 'string', 'max:2000'],
        ]);

        $categories = [];

        foreach ($request->input('categories', []) as $category) {
            $categories[] = [
                'slug' => $category['slug'],
                'title' => $category['title'],
                'description' => $category['description'],
                'items' => self::splitLines($category['items_text'] ?? ''),
            ];
        }

        ConfigWriter::write('portfolio', [
            'stats' => [
                'samp' => (int) $request->input('stats.samp'),
                'web' => (int) $request->input('stats.web'),
                'editing' => (int) $request->input('stats.editing'),
            ],
            'categories' => $categories,
        ]);

        return redirect()->route('admin.portfolio.edit')->with('status', 'Portofolio disimpan.');
    }

    public function storeCategory(): RedirectResponse
    {
        $portfolio = ConfigWriter::read('portfolio');
        $categories = $portfolio['categories'] ?? [];
        $index = count($categories) + 1;

        $categories[] = [
            'slug' => 'kategori-'.$index,
            'title' => 'Kategori Baru '.$index,
            'description' => 'Deskripsi kategori.',
            'items' => ['Item 1'],
        ];

        ConfigWriter::write('portfolio', [
            'stats' => $portfolio['stats'] ?? ['samp' => 0, 'web' => 0, 'editing' => 0],
            'categories' => $categories,
        ]);

        return redirect()->route('admin.portfolio.edit')->with('status', 'Kategori ditambahkan.');
    }

    public function destroyCategory(int $index): RedirectResponse
    {
        $portfolio = ConfigWriter::read('portfolio');
        $categories = $portfolio['categories'] ?? [];

        if (count($categories) <= 1 || ! isset($categories[$index])) {
            return redirect()->route('admin.portfolio.edit')->with('status', 'Minimal harus ada satu kategori.');
        }

        unset($categories[$index]);

        ConfigWriter::write('portfolio', [
            'stats' => $portfolio['stats'] ?? ['samp' => 0, 'web' => 0, 'editing' => 0],
            'categories' => array_values($categories),
        ]);

        return redirect()->route('admin.portfolio.edit')->with('status', 'Kategori dihapus.');
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
