<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class FinancialHelp extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'financial_help';

    protected $fillable = [
        'husband_address',
        'hus_district',
        'hus_taluk',
        'hus_pincode',
        'wife_address',
        'wife_district',
        'wife_taluk',
        'wife_pincode',
        'husband_address_old',
        'wife_address_old',
        'husband_caste',
        'wife_caste',
        'hus_work_before_marriage','wife_work_before_marriage',
        'wife_work_after_marriage','hus_work_after_marriage',
        'husband_age',
        'wife_age','register_details','certificate_details','apart_for_any_period',
        'duration','reason','financial_assistance',
        'difficulties','user_id','status','husband_sign','wife_sign','husband_name','wife_name','agree',
        'submitted_district',
        'submitted_teo',
        'place','date','time',
        'dist_name','teo_name',


      
        'hus_income_before_marriage',
        'wife_income_before_marriage',
        'hus_income_after_marriage',
        'wife_income_after_marriage',
        'register_marriage',

        'register_number',
        'register_date',
        'register_office_name',
        'marriage_certificate',
        
        
        



    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
