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
        'place',
        'date',
        'submitted_district',
        'submitted_teo',
        'signature','user_id','status'


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
