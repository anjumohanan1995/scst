<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;
class Institution extends Eloquent
{
    use HasFactory,SoftDeletes;
    protected $connection = 'mongodb';
    protected $collection = 'institution';

    protected $fillable = [
        'name',
        'address',
        'email',
        'phone_no',
        'user_id',
        'status',
        

    ];

}
