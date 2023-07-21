<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    protected $fillable = ['nama_id', 'status','tanggal','shift_id'];

    public function shift(){
        return $this->belongsTo('App\Models\Shift');
        
    }
    public function studentlabor(){
        return $this->belongsTo('App\Models\studentlabor','nama_id');
        
    }
}
