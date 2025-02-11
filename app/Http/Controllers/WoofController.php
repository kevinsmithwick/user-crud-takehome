<?php

namespace App\Http\Controllers;

use App\Services\WoofService;

class WoofController extends Controller
{

    public function index()
    {
        return view('dogs');
    }


    public function intake()
    {
        $data = ['dogs' => app()->make(WoofService::class)->intake()];
        return response()->json($data, 200);
    }

    public function onDeck()
    {
        $dogs = app()->make(WoofService::class)->onDeck();
        return view('partials.ondeck', ['dogs' => $dogs]);
    }

    public function euthanize($id)
    {
        app()->make(WoofService::class)->euthanize($id);
    }

    public function onBoardForm($id){
        $dog = app()->make(WoofService::class)->getDog($id);
        return view('partials.onboard', ['dog' => $dog]);
    }
}
