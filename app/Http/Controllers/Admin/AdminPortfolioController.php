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
            ],
            'categories' => $categories,
        ]);

        return redirect()->route('admin.portfolio.edit')->with('status', 'Portofolio disimpan.');
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
