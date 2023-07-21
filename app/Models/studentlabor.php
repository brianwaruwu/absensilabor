<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class studentlabor extends Model
{
    protected $fillable = ['nim', 'nama', 'pekerjaan_id', 'jurusan', 'tingkat','nohp'];
}
