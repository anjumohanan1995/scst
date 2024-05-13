<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class StudentAward extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'student_award';

    protected $guarded = ['_id', 'created_at', 'updated_at', 'deleted_at'];

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
    public function teoUser()
    {
        return $this->belongsTo(User::class,'teo_status_id');
    }
    public function prjUser()
    {
        return $this->belongsTo(User::class,'pjct_offcr_status_id');
    }
    public function tdoUser()
    {
        return $this->belongsTo(User::class,'tdo_status_id');
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
