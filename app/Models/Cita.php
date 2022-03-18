<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    static $rules = [
        'title' => 'required',
        'documentOwner' => 'required',
        'nameOwner' => 'required',
        'numberOwner' => 'required',
        'namePet' => 'required',
        'descripcionPet' => 'required',
        'start' => 'required',
        'timePet' => 'required',
        'end' => 'required'
    ];

    protected $fillable = [
        'title',
        'documentOwner',
        'nameOwner',
        'numberOwner',
        'namePet',
        'descripcionPet',
        'start',
        'timePet',
        'end'
    ];

}