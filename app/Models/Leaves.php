<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Leaves extends Model implements HasMedia
{
    use HasMediaTrait;
    public function users(){
        return $this->hasMany('App\Models\Users');
    }
}
