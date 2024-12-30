<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function inscription(){
        return $this->hasMany(IncriptionStudiant::class);
    }

    public function notificacion(){
        return $this->hasMany(Notificacion::class);
    }
}
