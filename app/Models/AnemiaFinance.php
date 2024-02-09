<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class AnemiaFinance extends Eloquent
{
    use SoftDeletes;

    protected $connection = 'mongodb';
    protected $collection = 'anemia_finance';

    protected $fillable = [
        'name',
        'dob',
        'age',
        'caste',
        'caste_certificate',
        'phone',
        'address',
        'district',
        'taluk',
        'pincode',
        'adhaar_number',
        'adhaar_copy',
        'bank_account_details',
        'passbook_copy',
        'ration_card_type',
        'ration_card',
        'is_medical_certificate_submitted',
        'medical_certificate',
        'place',
        'date',
        'signature',
        'applicant_photo',
        'submitted_district',
        'submitted_teo',
        'user_id','status',
        'email'


    ];

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
    public function submittedDistrict() {
        return $this->belongsTo('App\Models\District', 'submitted_district');
    }
    public function submittedTeo() {
        return $this->belongsTo('App\Models\Teo', 'submitted_teo');
    }
    
}
