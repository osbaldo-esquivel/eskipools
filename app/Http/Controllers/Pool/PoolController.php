<?php

namespace App\Http\Controllers\Pool;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PoolController extends Controller
{
    public function show(Request $request)
    {
        dd($request->all());
    }
}