<?php

namespace App\Http\Controllers\Pool;

use App\Domains\Picks\Picks;
use App\Domains\Weeks\Weeks;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditPoolController extends Controller
{
    public function edit(Request $request): View
    {
        $week = Weeks::getActive();

        $picks = Picks::getCurrentPicks($week->id, $request->user()->id);

        return view('layouts.pools.edit-pool', [
            'games' => $week->games->sortByDesc(
                function ($game) {
                    return $game->date;
                }
            ),
            'picks' => $picks,
            'week' => $week,
            'score' => $week->scores->where('user_id', $request->user()->id)->first()?->score ?? 1,
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {
        Picks::submit(array_merge([
            'user_id' => $request->user()->id,
        ], $request->except('_token')));

        return redirect()->back();
    }

    public function delete(Request $request): RedirectResponse
    {
        Picks::delete($request->id);

        return redirect()->back();
    }
}