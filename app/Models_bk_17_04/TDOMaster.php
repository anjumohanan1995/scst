<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
class TDOMaster extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'tdo_master';

    protected $fillable = [
        'district_id',
        'type',
        'name',
        


    ];
    public function districts() {
        return $this->belongsTo('App\Models\District','district_id');
    }


}
