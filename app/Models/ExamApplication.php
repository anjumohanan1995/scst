<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class ExamApplication extends Eloquent
{
    use HasFactory , SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'exam_application';

    protected $fillable = [
        'school_name',
        'student_name',
        'gender',
        'address',
        'district',
        'taluk',
        'pincode',
        'relation',
        'mother_name',
        'father_name',
        'annual_income',
        'occupation_parent',
        'dob',
        'caste',
        'other',
        'school_address',
        'birth_place',
        'mother_tonge',
        'user_id', 'status',
        'agree', 'signature',
        'parent_name',
        'date', 'place',
        'submitted_district',
        'submitted_teo',
        'age',
        'birth_district',
        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'applicant_image',

        'clerk_view_status',
        'clerk_view_id',
        'clerk_view_date',
        'clerk_status',
        'clerk_status_id',
        'clerk_status_date',
        'clerk_status_reason',

        'JsSeo_view_status',
        'JsSeo_view_id',
        'JsSeo_view_date',
        'JsSeo_status',
        'JsSeo_status_id',
        'JsSeo_status_date',
        'JsSeo_status_reason',


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

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function districtRelation()
    {
        return $this->belongsTo('App\Models\District', 'district');
    }
    public function birthDistrictRelation()
    {
        return $this->belongsTo('App\Models\District', 'birth_district');
    }
    public function talukName()
    {
        return $this->belongsTo('App\Models\Taluk', 'taluk');
    }
    public function submittedDistrict() {
        return $this->belongsTo('App\Models\District', 'submitted_district');
    }
    public function submittedTeo() {
        return $this->belongsTo('App\Models\Teo', 'submitted_teo');
    }
    public function teoUser()
    {
        return $this->belongsTo(User::class,'teo_status_id');
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
