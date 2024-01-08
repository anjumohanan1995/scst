<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Teo extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'teo';

    protected $fillable = [
        'district_id','teo_name'
    ];
    public function districts() {
        return $this->belongsTo('App\Models\District','district_id');
    }
}
