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
        'place','signature','photo',
        'submitted_district',
        'dist_name',
        'submitted_teo',
        'teo_name',
        'date','time',
        'user_id',
        'status',
        'principal_declaration',
        'panchayath',
        'parent_bank_branch',
        'parent_account_no',
        'parent_ifsc_code',

        
        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'date_received'
        
        
    ];
    public function districts() {
        return $this->belongsTo('App\Models\District','district_id');
    }


}
