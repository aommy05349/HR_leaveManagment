<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Users extends Authenticatable implements HasMedia
{
    use HasMediaTrait;
    
    use Notifiable;
   
    protected $hidden = [
        'password','remember_token',
    ];
    protected $fillable = [
        'full_name', 'email', 'password','username','lavel'
    ];
    protected $dates = [
        'birthdate',
    ];
   
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
        ->width(150)
        ->height(100);
    }
    public function position(){
        return $this->hasOne('App\Models\Positions');
    }
    
    public function contracts(){
        return $this->hasOne('App\Models\Contracts');
    }

    public function rankings(){
        return $this->hasOne('App\Models\Rankings');
    }

    public function status(){
        return $this->hasOne('App\Models\Status');
    }
    
    // public function leave(){
    //     return $this->hasOne('App\Models\Leaves');
    // }
    public function leavetype(){
        return $this->hasOne('App\Models\LeaveTypes');
    }

    public function levels(){
        return $this->hasOne('App\Models\Levels');
    }
    public function leaves(){
        return $this->hasOne('App\Models\Leaves');
    }
}

