<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class FinancialHelp extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'financial_help';

    protected $fillable = [
        'husband_address',
        'wife_address',
        'husband_address_old',
        'wife_address_old',
        'husband_caste',
        'wife_caste',
        'hus_work_before_marriage','wife_work_before_marriage',
        'wife_work_after_marriage','hus_work_after_marriage',
        'husband_age',
        'wife_age','register_details','certificate_details','apart_for_any_period',
        'duration','reason','financial_assistance',
        'difficulties','user_id','status','husband_sign','wife_sign','husband_name','wife_name','agree'


    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
