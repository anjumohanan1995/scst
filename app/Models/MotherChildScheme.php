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
        'district',
        'taluk',
        'pincode',
        'age',
        'dob',
        'hus_name',
        'caste',
        'village',
        'births',
        'expected_date_of_delivery',
        'dependent_hospital',
        'place',
        'date',
        'submitted_district',
        'submitted_teo',
        'signature','applicant_photo','user_id','status'


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function districtRelation() {
        return $this->belongsTo('App\Models\District', 'district');
    }
    public function talukName() {
        return $this->belongsTo('App\Models\Taluk', 'taluk');
    }
    public function submittedDistrict() {
        return $this->belongsTo('App\Models\District', 'submitted_district');
    }
    public function submittedTeo() {
        return $this->belongsTo('App\Models\Teo', 'submitted_teo');
    }

    
}
