<?php

namespace App\Http\Controllers;

use App\Models\Generator;
use Illuminate\Http\Request;

class GeneratorController extends Controller
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

    public function new()
    {
        return view('generator.new');
    }

    public function edit(int $id)
    {
        $generator = Generator::find($id);
        $internalCode = $generator->internal_code;

        return view('generator.edit', [
            'brand' => $generator->brand,
            'id' => $id,
            'model' => $generator->model,
            'month' => substr($internalCode, 4, 2),
            'year' => substr($internalCode, 0, 4),
        ]);
    }

    public function updateState(int $id, int $state_id)
    {
        $generator = Generator::find($id);

        $generator->update(['state_id' => $state_id]);

        return redirect('home');
    }

    public function store(Request $req)
    {
        $generator = new Generator();

        $year = $req->input('year');
        $month = $req->input('month');
        $brand = $req->input('brand');
        $model = $req->input('model');

        if (empty($month)) {
            $month = date("m");
        }

        if (empty($year)) {
            $year = date("Y");
        }

        $lastGenerator  = Generator::latest()->first();

        $internalCode = $year . $month . ($lastGenerator ? number_format($lastGenerator->id + 1, 3) : '001');

        $generator->internal_code = $internalCode;
        $generator->brand = $brand;
        $generator->model = $model;

        $generator->save();

        return redirect('home');
    }

    public function update(Request $req)
    {
        $generator = Generator::find($req->input('id'));

        $year = $req->input('year');
        $month = $req->input('month');
        $brand = $req->input('brand');
        $model = $req->input('model');

        if (empty($month)) {
            $month = date("m");
        }

        if (empty($year)) {
            $year = date("Y");
        }

        $internalCode = $year . $month . number_format($req->input('id'), 3);

        $generator->update([
            'internal_code' => $internalCode,
            'brand' => $brand,
            'model' => $model
        ]);

        return redirect('home');
    }
}
