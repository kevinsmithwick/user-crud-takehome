<?php

namespace App\Services;

use App\Api\WoofApi;
use App\Models\Dog;
use App\Models\Name;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

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


    public function onDeck(): Collection
    {
        return Dog::where('state', 'ON-DECK')
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function registered(): Collection
    {
        return Dog::where('state', 'REGISTERED')
            ->orderBy('created_at')
            ->get();
    }

    public function euthanize($id): void
    {
        Dog::find($id)->update(['state' => 'EUTHANIZED']);
    }

    public function ADOPT($id): void
    {
        Dog::find($id)->update(['state' => 'ADOPTED']);
    }

    public function getDog($id): Dog
    {
        return Dog::find($id);
    }

    public function registerDog($dogId, $dog)
    {
        $dog['state'] = 'REGISTERED';
        $data = [
            'name' => $dog['name'],
            'breed' => $dog['breed'],
            'age' => $dog['age'],
            'sex' => $dog['sex'],
            'state' => 'REGISTERED',
            'temperament' => $dog['temperament'],
            'cuteness' => $dog['cuteness'],
            'size' => $dog['size'],
            'adoption_date' => Carbon::now(),
        ];
        Dog::find($dogId)->update($data);
    }
}
