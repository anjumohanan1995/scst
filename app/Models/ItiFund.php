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
        'current_institution'
        

    ];

}
