<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Slider extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'slider';

    protected $fillable = [
        'slider_category_id', 
        'title', 
        'image',
        'button_text',
        'button_url',
        'button_one_text',
        'button_one_url',
        'button_status',
        'slider_style',
        'color',
        'slider_status',
    ];
}
