<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function incripciones(){
        return $this->belongsTo(IncriptionStudiant::class,'incription_id');
    }

}
