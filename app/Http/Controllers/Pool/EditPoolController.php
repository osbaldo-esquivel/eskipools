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
        return view('pools.edit-pool', [
            'week' => Weeks::getActive(),
        ]);
    }

    public function submit(Request $request): RedirectResponse
    {dd($request->except('_token'));
        Picks::submit(array_merge([
            'user_id' => $request->user()->id,
        ], $request->except('_token')));

        return redirect()->back();
    }
}