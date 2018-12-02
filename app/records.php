<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class records extends Model
{
    //
    protected $fillable = [
        'AC',
        'Artist',
        'Title',
        'Date',
        'Medium',
        'Dimension',
        'Category'

    ];
}
//AC#	Artist	Title	Date	Medium	Dimensions	Category	Id
