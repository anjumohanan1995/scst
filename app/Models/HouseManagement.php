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
        
        'clerk_view_status',
        'clerk_view_id',
        'clerk_view_date',
        'clerk_status',
        'clerk_status_id',
        'clerk_status_date',
        'clerk_status_reason',
        
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
