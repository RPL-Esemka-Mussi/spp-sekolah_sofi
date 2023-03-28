<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Spp extends Model
{
    use SoftDeletes;

    protected $table = "spp";

    protected $fillable = [
        'tahun',
        'nominal',
    ];

    protected $hidden;

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'spp_id');
    }
}
