<?php

namespace App\Services;

use App\Api\WoofApi;
use App\Models\Dog;
use App\Models\Name;

class WoofService
{

    public function getNewWoofImage(): string
    {
        return (new WoofApi())->getDogImage();
    }


    public function intake()
    {
        $number = rand(-10, 3);
        if ($number > 0) {
            $this->generateNewDogs($number);
        }
        return $number;
    }

    public function generateNewDogs($number = 1): void
    {
        for ($i = 1; $i <= $number; $i++) {
            $this->generateNewDog();
        }
    }

    public function generateNewDog()
    {
        Dog::create([
            'name' => Name::inRandomOrder()->first()->name,
            'image_url' => $this->getNewWoofImage()
        ]);
    }

    public function onDeck()
    {
        return Dog::where('state', 'ON-DECK')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function euthanize($id)
    {
        Dog::find($id)->update(['state' => 'EUTHANIZED']);
    }

    public function getDog($id)
    {
        return Dog::find($id);
    }
}
