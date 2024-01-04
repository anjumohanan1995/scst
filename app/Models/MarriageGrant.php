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
        'permanent_address',
        'family_details',
        'caste',
        'caste_certificate',
        'name_and_address_fiancee',
        'relation_with_applicant',
        'marriage_count',
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
        'groom_name_and_address',
        'name_and_address_groom_parent',
        'financial_assistance_details',
        'place',
        'date',
        'signature','user_id','status'


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
