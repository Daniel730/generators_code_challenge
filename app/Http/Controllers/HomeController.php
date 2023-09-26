<?php

namespace App\Http\Controllers;

use App\Models\Generator;
use App\Models\State;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'generators' => Generator::with('state')->get(),
            'states' => State::get()
        ]);
    }
}
