<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SliderCategory extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'slidercategory';

    protected $fillable = [
        'category_name', 'category_position', 'category_status',
    ];

    
}
