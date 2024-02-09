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
        'applicant_image'
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
}
