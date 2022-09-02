<?php

namespace App\Http\Controllers\Pool;

use App\Domains\Picks\Picks;
use App\Domains\Weeks\Weeks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function show(Request $request)
    {
        $week = Weeks::getActive();

        return view('layouts.pools.pool', [
            'games' => $week->games->sortByDesc(
                function ($game) {
                    return $game->date;
                }
            ),
            'week' => $week,
        ]);
    }
}