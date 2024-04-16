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
        'date_received',

        
        'JsSeo_view_status',
        'JsSeo_view_id',
        'JsSeo_view_date',
        'JsSeo_status',
        'JsSeo_status_id',
        'JsSeo_status_date',
        'JsSeo_status_reason',

        'clerk_view_status',
        'clerk_view_id',
        'clerk_view_date',
        'clerk_status',
        'clerk_status_id',
        'clerk_status_date',
        'clerk_status_reason',
        
        'assistant_view_status',
        'assistant_view_id',
        'assistant_view_date',
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
        
        
    ];
    public function districts() {
        return $this->belongsTo('App\Models\District','district_id');
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
}
