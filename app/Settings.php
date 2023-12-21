<?php

namespace App;

  
use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 
use Illuminate\Database\Eloquent\SoftDeletes;

class Settings extends Eloquent
{
    
    use SoftDeletes;
    protected $connection = 'mongodb';
      
    protected $collection = 'settings';  



    protected $fillable = [
        'logo',
        'project_title',
        'mobile',
        'mobile_one',
        'email',
        'address',
        'copy_right',
        'favicon',
        'language','banner_image','footer_logo','preloader_logo'
        
    ];
}


