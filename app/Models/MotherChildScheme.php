<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MotherChildScheme extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'mother_child_scheme';

    protected $fillable = [
        'name',
        'address',
        'district',
        'taluk',
        'pincode',
        'age',
        'dob',
        'hus_name',
        'caste',
        'village',
        'births',
        'expected_date_of_delivery',
        'dependent_hospital',
        'place',
        'date',
        'submitted_district',
        'submitted_teo',
        'signature','applicant_photo','user_id','status',

        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',

        'clerk_view_status',
        'clerk_view_id',
        'clerk_view_date',
        'clerk_status',
        'clerk_status_id',
        'clerk_status_date',
        'clerk_status_reason',
        
        

        'tdo_view_status',
        'tdo_view_id',
        'tdo_view_date',
        'tdo_status',
        'tdo_status_id',
        'tdo_status_date',
        'tdo_status_reason',

        'pjct_offcr_view_status',
        'pjct_offcr_view_id',
        'pjct_offcr_view_date',
        'pjct_offcr_status',
        'pjct_offcr_status_id',
        'pjct_offcr_status_date',
        'pjct_offcr_status_reason',

    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function districtRelation() {
        return $this->belongsTo('App\Models\District', 'district');
    }
    public function talukName() {
        return $this->belongsTo('App\Models\Taluk', 'taluk');
    }
    public function submittedDistrict() {
        return $this->belongsTo('App\Models\District', 'submitted_district');
    }
    public function submittedTeo() {
        return $this->belongsTo('App\Models\Teo', 'submitted_teo');
    }

    


    public function prjUser()
    {
        return $this->belongsTo(User::class,'pjct_offcr_status_id');
    }
    public function tdoUser()
    {
        return $this->belongsTo(User::class,'tdo_status_id');
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
