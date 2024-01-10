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
        'caste',
        'anual_income',
        'house_details',
        'agency',
        'last_payment_year',
        'family_details',
        'nature_payment',
        'payment_details',
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

    ];

}
