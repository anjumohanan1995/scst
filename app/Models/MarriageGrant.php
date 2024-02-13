<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class MarriageGrant extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'marriage_grant';

    protected $fillable = [
        'name',
        'age',
        'current_address',
        'current_district',
        'current_taluk',
        'current_pincode',
        'permanent_address',
        'permanent_district',
        'permanent_taluk',
        'permanent_pincode',
        'family_details',
        'caste',
        'caste_certificate',
        'fiancee_name',
        'fiancee_address',
        'fiancee_district',
        'fiancee_taluk',
        'fiancee_pincode',
        'relation_with_applicant',
        'marriage_type',
        'is_widow',
        'parent_occupation',
        'annual_income',
        'income_certificate',
        'marriage_place',
        'marriage_date',
        'fiancee_family_details',
        'disabled_parent_info',
        'freedmen_parent_details',
        'violence_by_non_scheduled_tribes_info',
        'land_alienated_details',
        'outcast_parent_details',
        'remarried_parent_details',
        'groom_name',
        'groom_address',
        'groom_district',
        'groom_taluk',
        'groom_pincode',
        'groom_parent_name',
        'groom_parent_address',
        'groom_parent_district',
        'groom_parent_taluk',
        'groom_parent_pincode',
        'financial_assistance_details',
        'panchayath_name',
        'submitted_after_marriage',
        'date_of_marriage',
        'marriage_certificate',
        'invitation_letter',
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

    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function CurrentDistrict() {
        return $this->belongsTo('App\Models\District', 'current_district');
    }
    public function CurrentTaluk() {
        return $this->belongsTo('App\Models\Taluk', 'current_taluk');
    }
    public function PermanentDistrict() {
        return $this->belongsTo('App\Models\District', 'permanent_district');
    }
    public function PermanentTaluk() {
        return $this->belongsTo('App\Models\Taluk', 'permanent_taluk');
    }

    public function FinanceeDistrict() {
        return $this->belongsTo('App\Models\District', 'fiancee_district');
    }
    public function FinanceeTaluk() {
        return $this->belongsTo('App\Models\Taluk', 'fiancee_taluk');
    }
    public function GroomDistrict() {
        return $this->belongsTo('App\Models\District', 'groom_district');
    }
    public function GroomTaluk() {
        return $this->belongsTo('App\Models\Taluk', 'groom_taluk');
    }
    public function GroomParentDistrict() {
        return $this->belongsTo('App\Models\District', 'groom_parent_district');
    }
    public function GroomParentTaluk() {
        return $this->belongsTo('App\Models\Taluk', 'groom_parent_taluk');
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
    public function district()
    {
        return $this->belongsTo(District::class,'submitted_district');
    }
    public function teo()
    {
        return $this->belongsTo(Teo::class,'submitted_teo');
    }
}
