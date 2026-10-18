<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Support\ConfigWriter;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $contact = ConfigWriter::read('contact');
        $affiliate = ConfigWriter::read('products');
        $services = ConfigWriter::read('services')['services'] ?? [];
        $portfolio = ConfigWriter::read('portfolio');

        $samp = (int) data_get($portfolio, 'stats.samp', 0);
        $web = (int) data_get($portfolio, 'stats.web', 0);
        $totalProjects = max($samp + $web, 1);

        $sampPct = (int) round(($samp / $totalProjects) * 100);
        $webPct = 100 - $sampPct;

        $tierPrices = [];

        foreach ($services as $service) {
            foreach (data_get($service, 'pricing.tiers', []) as $tier) {
                $name = (string) data_get($tier, 'name');
                $price = (string) data_get($tier, 'price');
                $numeric = preg_replace('/[^0-9]/', '', $price);

                if ($numeric === '' || $numeric === null) {
                    continue;
                }

                $tierPrices[] = [
                    'name' => $name,
                    'value' => (int) $numeric,
                    'display' => $price,
                    'service' => (string) data_get($service, 'short', data_get($service, 'title')),
                ];
            }
        }

        usort($tierPrices, static fn (array $a, array $b): int => $b['value'] <=> $a['value']);
        $tierPrices = array_slice($tierPrices, 0, 6);

        $values = array_map(static fn (array $tier): int => (int) $tier['value'], $tierPrices);
        $maxPrice = $values === [] ? 1 : max($values);
        $maxPrice = max($maxPrice, 1);

        foreach ($tierPrices as $index => $tier) {
            $tierPrices[$index]['pct'] = max(4, (int) round(((int) $tier['value'] / $maxPrice) * 100));
        }

        $circumference = 2 * M_PI * 40;
        $sampDash = ($sampPct / 100) * $circumference;

        return view('admin.dashboard', [
            'contact' => $contact,
            'affiliate' => $affiliate,
            'services' => $services,
            'portfolio' => $portfolio,
            'samp' => $samp,
            'web' => $web,
            'totalProjects' => $samp + $web,
            'sampPct' => $sampPct,
            'webPct' => $webPct,
            'tierPrices' => $tierPrices,
            'serviceCount' => count($services),
            'tierCount' => count($tierPrices),
            'circumference' => round($circumference, 2),
            'sampDash' => round($sampDash, 2),
            'categoryCount' => count(data_get($portfolio, 'categories', [])),
        ]);
    }
}
