<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StudentAward extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'student_award';

    protected $fillable = [
        'name',
        'dob',
        'address',
        'district',
        'taluk',
        'pincode',        
        'examination_passed',
        'guardian_name',
        'community',
        'panchayath_name',
        'institution_name',
        'pass_month',
        'pass_year',
        'phone',
        'account_number',
        'ifsc_code',
        'aadhar_number',
        'signature',
        'date',
        'submitted_district',
        'submitted_teo',
        'user_id','status'


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

    
}
