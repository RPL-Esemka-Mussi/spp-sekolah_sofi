<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Siswa extends Model
{
    use softDeletes;

    protected $table = 'siswa';

    protected $fillable = [
        'user_id',
        'nis',
        'kelas_id',
        'alamat',
        'no_telp',
        'spp_id',
    ];

    protected $hidden;

    public function kelas(){
        return $this->hasOne(Kelas::class, 'id', 'kelas_id');
    }

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function spp(){
        return $this->hasOne(Spp::class, 'id', 'spp_id');
    }
}

?>
