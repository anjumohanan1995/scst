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
        'difficulties','user_id','status','husband_sign','wife_sign','husband_name','wife_name','agree','husband_photo','wife_photo',
        'submitted_district',
        'submitted_teo',
        'place','date','time',
        'dist_name','teo_name',
        'husband_panchayath',
        'wife_panchayath',

      
        'hus_income_before_marriage',
        'wife_income_before_marriage',
        'hus_income_after_marriage',
        'wife_income_after_marriage',
        'register_marriage',

        'register_number',
        'register_date',
        'register_office_name',
        'marriage_certificate',
      
        'teo_view_status',
        'teo_return_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_return_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'date_received',

        'clerk_view_status',
        'clerk_return_view_status',
        'clerk_view_id',
        'clerk_view_date',
        'clerk_return_view_date',
        'clerk_status',
        'clerk_status_id',
        'clerk_status_date',
        'clerk_status_reason',

        'JsSeo_view_status',
        'JsSeo_return_view_status',
        'JsSeo_view_id',
        'JsSeo_view_date',
        'JsSeo_return_view_date',
        'JsSeo_status',
        'JsSeo_status_id',
        'JsSeo_status_date',
        'JsSeo_status_reason',
        'JsSeo_return_date',
        
        'assistant_view_status',
        'assistant_return_view_status',
        'assistant_view_id',
        'assistant_view_date',
        'assistant_return_view_date',
        'assistant_status',
        'assistant_status_id',
        'assistant_status_date',
        'assistant_status_reason',

        'officer_view_status',
        'officer_view_id',
        'officer_view_date',
        'officer_status',
        'officer_status_id',
        'officer_status_date',
        'officer_status_reason',
        
        'teo_return',
        'clerk_return',
        'JsSeo_return',
        'assistant_return',
        'officer_return',
        'return_date',
        'return_userid',
        'return_reason',
        'return_status',
        'rejection_status'




    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function teoUser()
    {
        return $this->belongsTo(User::class,'teo_status_id');
    }
    public function district()
    {
        return $this->belongsTo(District::class,'submitted_district');
    }
    public function teo()
    {
        return $this->belongsTo(Teo::class,'submitted_teo');
    }
    public function clerkUser()
    {
        return $this->belongsTo(User::class,'clerk_status_id');
    }
    public function JsSeoUser()
    {
        return $this->belongsTo(User::class,'JsSeo_status_id');
    }
    public function assistantUser()
    {
        return $this->belongsTo(User::class,'assistant_status_id');
    }
    public function officerUser()
    {
        return $this->belongsTo(User::class,'officer_status_id');
    }
    public function returnUser()
    {
        return $this->belongsTo(User::class,'return_userid');
    }

}
