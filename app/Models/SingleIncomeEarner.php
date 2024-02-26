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
    public function assistantUser()
    {
        return $this->belongsTo(User::class,'assistant_status_id');
    }
    public function officerUser()
    {
        return $this->belongsTo(User::class,'officer_status_id');
    }

}
