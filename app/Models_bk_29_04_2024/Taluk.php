<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Taluk extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'taluks';

    protected $fillable = [
        'district_id','taluk_name'
    ];
    public function district() {
        return $this->belongsTo('App\Models\District','district_id');
    }
}
