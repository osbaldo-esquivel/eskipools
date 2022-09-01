<?php

namespace App\Http\Controllers\Pool;

use App\Domains\Scores\Scores;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ScoreController extends Controller
{
    public function submit(Request $request): RedirectResponse
    {
        $user_id = $request->user()->id;
        
        Scores::save(array_merge([
            'user_id' => $user_id,
        ], $request->except('_token')));

        return redirect()->back();
    }
}