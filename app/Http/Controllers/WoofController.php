<?php

namespace App\Http\Controllers;

use App\Models\Dog;
use App\Services\WoofService;
use Illuminate\Http\Request;

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

    public function adopt($id)
    {
        app()->make(WoofService::class)->adopt($id);
    }

    public function onBoardForm($id)
    {
        $data = [
            'dog' => app()->make(WoofService::class)->getDog($id),
            'sexes' => Dog::SEXES,
            'temperaments' => Dog::TEMPERAMENT,
            'cutenesses' => Dog::CUTENESS,
            'sizes' => Dog::SIZE,
        ];
        return view('partials.onboard', $data);
    }

    public function registerDog(Request $request, $dogId){
        app()->make(WoofService::class)->registerDog($dogId, $request->all());
    }
    public function registered()
    {
        $data = ['dogs' => app()->make(WoofService::class)->registered()];
        return view('partials.registered', $data);

    }
}
