<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;




class Medias extends Model
{
    use HasMediaTrait;
    public function user(){
        return $this->hasOne('App\Models\Users','id');
    }
}
