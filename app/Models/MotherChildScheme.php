<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotherChildScheme extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'mother_child_scheme';

    protected $fillable = [
        'name',
        'address',
        'age',
        'dob',
        'hus_name',
        'caste',
        'village',
        'births',
        'expected_date_of_delivery',
        'dependent_hospital',
        'place',
        'signature','user_id','status'


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
