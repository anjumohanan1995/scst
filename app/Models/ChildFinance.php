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
        'submitted_teo',
        'teo_name',
        'date','user_id','status',
        'approved_by',
        'approved_date',
        'rejected_by',
        'rejected_date',
        'rejected_reason',
        'date','time',


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function RejectedUser()
    {
        return $this->belongsTo(User::class, 'rejected_by');
    }

    
}
