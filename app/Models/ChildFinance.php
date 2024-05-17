<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ChildFinance extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'child_finance';

    protected $fillable = [
        'name',
        'age',
        'dob',
        'birth_certificate',
        'father_name',
        'mother_name',
        'guardian_name',
        'address',
        'current_district',
        'current_district_name',
        'current_taluk','current_taluk_name','current_pincode','caste','mobile','account_number',
        'aadhar_number','voter_id','ration_card_number','place','signature','child_signature','submitted_district','dist_name',
        'email',
        'reason_for_orphan',
        'reason',
        'death_certificate',
        'tribal_extension_certificate',
        'submitted_teo',
        'teo_name',
        'date','user_id','status',
        'approved_by',
        'approved_date',
        'rejected_by',
        'rejected_date',
        'rejected_reason',
        'date','time',

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
        'officer_return_view_status',
        'officer_view_id',
        'officer_view_date',
        'officer_return_view_date',
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
    public function RejectedUser()
    {
        return $this->belongsTo(User::class, 'rejected_by');
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
