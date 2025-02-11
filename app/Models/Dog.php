<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    const STATES = ['ON-DECK', 'PENDING', 'ADOPTED', 'EUTHANIZED'];
    const TEMPERAMENT = ['aggressive', 'average', 'dosile'];
    const CUTENESS = ['ugly', 'average', 'adorable'];
    const SIZE = ['ity-bity', 'small', 'medium', 'large', 'monster'];
    protected $fillable = [
        'name',
        'breed',
        'age',
        'sex',
        'state',
        'temperament',
        'cuteness',
        'size',
        'image_url',
        'adoption_date',
        'euthanized_date'
    ];

}
