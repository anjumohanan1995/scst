<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class TuitionFee extends Eloquent
{


    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'tuition_fee';

    protected $fillable = [
        'name',
        'address',
        'current_district',
        'current_district_name',
        'current_taluk',
        'current_taluk_name',
        'current_pincode',
        'mobile',
        'caste',
        'relegion',
        'annual_income',
        'student_name','relation',
        'school_name','class_number',
        'tuition_center',
        'place','signature',
        'submitted_district',
        'dist_name',
        'submitted_teo',
        'teo_name',
        'date',
        'user_id',
        'status'
    ];
    public function districts() {
        return $this->belongsTo('App\Models\District','district_id');
    }


}
