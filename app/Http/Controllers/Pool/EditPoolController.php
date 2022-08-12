<?php

namespace App\Http\Controllers\Pool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditPoolController extends Controller
{
    public function edit(Request $request)
    {
        dd($request->all());
    }
}