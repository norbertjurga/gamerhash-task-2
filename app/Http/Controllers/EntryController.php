<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Support\Facades\Redis;
use App\Http\Requests\StoreEntryRequest;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $len = Redis::command('LLEN', ['entries']);
        $entries = Redis::command('LRANGE', ['entries', 0, $len - 1]);
        return Inertia::render('App', ['entries' => array_reverse($entries)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEntryRequest $request)
    {
        Redis::command('RPUSH', ['entries', $request->text]);
        return back(303);
    }
}
