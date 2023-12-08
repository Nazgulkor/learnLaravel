<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Donate;
use Illuminate\Http\Request;

class DonateController extends Controller
{

    public function __invoke()
    {
        //заполнение рандомными таблицу донатов
        // $currencies = Currency::query()->get();
        // for($i = 0; $i < 3000; $i++){
        //     Donate::forceCreate([
        //         'created_at' => now()->subDays(rand(0,1000)),
        //         'amount' => rand(1,1000),
        //         'currency_id' => $currencies->random()->id
        //     ]);
        // }


        // $stats = Donate::query()->count();
        // $stats = Donate::query()->sum('amount');
        // $stats = Donate::query()->avg('amount');
        // $stats = Donate::query()->min('amount');
        // $stats = Donate::query()->max('amount');

        $stats = Donate::query()
            ->select(['currency_id'])
            ->selectRaw('count(*) AS total_count')
            ->selectRaw('sum(amount) AS total_amount')
            ->selectRaw('avg(amount) AS avg_amount')
            ->selectRaw('min(amount) AS min_amount')
            ->selectRaw('max(amount) AS max_amount')
            ->groupBy('currency_id')
            ->get();

        return view('user.donates.index', compact('stats'));
    }
}
