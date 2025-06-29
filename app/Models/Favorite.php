<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = [
        'category',
        'finnish',
        'difficulty',
        'english',
        'pronunciation',
        'example',
    ];
}
