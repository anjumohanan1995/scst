<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;

class SingleIncomeEarner extends Eloquent
{
    use HasFactory, SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'single_income_earner';


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
    public function teo()
    {
        return $this->belongsTo(Teo::class,'submitted_teo');
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
    public function DcUser()
    {
        return $this->belongsTo(User::class,'Dc_status_id');
    }
    public function D_JsSeoUser()
    {
        return $this->belongsTo(User::class,'D_JsSeo_status_id');
    }
    public function D_adUser()
    {
        return $this->belongsTo(User::class,'D_ad_status_id');
    }
    public function D_jdUser()
    {
        return $this->belongsTo(User::class,'D_jd_status_id');
    }
    public function SaUser()
    {
        return $this->belongsTo(User::class,'Sa_status_id');
    }
    public function S_soUser()
    {
        return $this->belongsTo(User::class,'S_so_status_id');
    }
    public function S_usUser()
    {
        return $this->belongsTo(User::class,'S_us_status_id');
    }
    public function S_asUser()
    {
        return $this->belongsTo(User::class,'S_as_status_id');
    }
    public function S_acsUser()
    {
        return $this->belongsTo(User::class,'S_acs_status_id');
    }
    public function MoUser()
    {
        return $this->belongsTo(User::class,'Mo_status_id');
    }
    
}
