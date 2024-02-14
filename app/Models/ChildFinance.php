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
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'date_received'
        


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
    
}
