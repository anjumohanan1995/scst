<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class SchemeAmount extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'scheme_amounts';

    protected $fillable = [
        'scheme_name','scheme_amount'
    ];

}

