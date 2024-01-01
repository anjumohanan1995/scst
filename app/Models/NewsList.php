<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class NewsList extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'newslist';

    protected $fillable = [
        'slider_category_id',
        'name',
        'status',
        'image'
    ];
}
