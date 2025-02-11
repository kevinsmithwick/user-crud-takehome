<?php

namespace App\Console\Commands;

use App\Api\WoofApi;
use App\Services\WoofService;
use Illuminate\Console\Command;

class DogCommand extends Command
{
    protected $signature = 'spawn:dogs';

    public function handle()
    {
        $number = rand(1, 10);
        if ($number > 0) {
            app()->make(WoofService::class)->generateNewDogs($number);
        }

    }
}
