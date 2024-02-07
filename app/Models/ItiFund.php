<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ItiFund extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'iti_fund_scheme';

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
        'institution_name',
        'current_institution',
        'submitted_district_name',
        'submitted_teo_name',
        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'applicant_image',

        'panchayath',
        'metric_type',
        'course_duration',
        'institution_type',
        'admission_date',
        'attendance_doc',
        'parent_bank_branch',
        'parent_account_no',
        'parent_ifsc_code',
        'principal_bank_branch',
        'principal_account_no',
        'principal_ifsc_code',
        
        

    ];

}
