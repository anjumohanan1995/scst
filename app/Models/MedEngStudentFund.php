<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MedEngStudentFund extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'student_fund_scheme';

    protected $fillable = [
        'name',
        'address',
        'course_name',
        'class_start_date',
        'admission_type',
        //'house_details',
        'caste',
        'caste_certificate',
        'income',
        'income_certificate',
        'account_details',
        'signature',
        'parent_name',
        'date',
        'time',
        'parent_signature',
        'status',
        'user_id',
        'current_district_name',
        'current_taluk_name',
        'current_pincode',
        'submitted_district',
        'submitted_teo',
        'current_district',
        'current_taluk',
        'ifsc_code',
        'account_no',
        'bank_branch',
        'dist_name',
        'teo_name',
        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'applicant_image',
        'panchayath',
        'institution_type',
        'allotment_memo',
        'other_details'
    ];

    public function teo()
    {
        return $this->belongsTo(Teo::class,'submitted_teo');
    }
    public function prjUser()
    {
        return $this->belongsTo(User::class,'pjct_offcr_status_id');
    }
    public function tdoUser()
    {
        return $this->belongsTo(User::class,'tdo_status_id');
    }
    public function teoUser()
    {
        return $this->belongsTo(User::class,'teo_status_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'submitted_district');
    }

}
