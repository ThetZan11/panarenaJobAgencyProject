<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;


    protected $fillable = [
        'foodname',
        'price',
        'name',
        'phone',
        'phone2',
        'address',
        'image',
        'image2',
        'image3',
        'fbacc',

    ];

}
