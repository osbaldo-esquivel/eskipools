<?php

namespace App\Http\Controllers\Pool;

use App\Domains\Picks\Picks;
use App\Domains\Weeks\Weeks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditPoolController extends Controller
{
    public function edit(Request $request)
    {
        return view('pools.edit-pool', [
            'week' => Weeks::getActive(),
        ]);
    }

    public function submit(Request $request)
    {
        Picks::submit(array_merge([
            'user_id' => $request->user()->id,
        ], $request->all()));
    }
}