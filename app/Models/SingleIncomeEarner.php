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
    
}
