<?php

namespace App\Http\Controllers;

use App\Models\Pin;

class PinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $minUsed = Pin::whereValid(true)->min('used');
        $pins = Pin::whereValid(true)->whereUsed($minUsed)
                    ->inRandomOrder()->take(request('count'))
                    ->pluck('pin');
        Pin::whereIn('pin', $pins)->increment('used');
        return $pins;
    }
}
