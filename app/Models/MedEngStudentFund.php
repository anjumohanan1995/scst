<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MedEngStudentFund extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'student_fund_scheme';

    protected $guarded = ['_id', 'created_at', 'updated_at', 'deleted_at'];

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

}
