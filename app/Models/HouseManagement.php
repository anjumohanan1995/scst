<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class HouseManagement extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'house_scheme';

    protected $fillable = [
        'name',
        'address',
        'panchayath',
        'ward_no',
        'caste',
        'annual_income',
        'house_details',
        'agency',
        'last_payment_year',
        'family_details',
        'nature_payment',
        'payment_details',
        'payment_amount',
        'date_recieved',
        'prove_eligibility',
        'place',
        'date',
        'signature',
        'status',
        'user_id',
        'prove_eligibility_file',
        'current_district_name',
        'current_taluk_name',
        'current_pincode',
        'submitted_district',
        'submitted_teo',
        'current_district',
        'current_taluk',
        'time',
        'dist_name',
        'teo_name',
        'teo_view_status',
        'teo_view_id',
        'teo_view_date',
        'teo_status',
        'teo_status_id',
        'teo_status_date',
        'teo_status_reason',
        'date_received',
        'applicant_image',
        
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
