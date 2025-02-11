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


    public function intake(): int   
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

    public function generateNewDog(): void
    {
        Dog::create([
            'name' => Name::inRandomOrder()->first()->name,
            'image_url' => $this->getNewWoofImage()
        ]);
    }

    public function onDeck(): array
    {
        return Dog::where('state', 'ON-DECK')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function euthanize($id): void
    {
        Dog::find($id)->update(['state' => 'EUTHANIZED']);
    }

    public function getDog($id): Dog
    {
        return Dog::find($id);
    }
}
