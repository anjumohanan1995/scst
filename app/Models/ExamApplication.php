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
}
