<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use SoftDeletes;

    protected $table = 'kelas';
    protected $fillable = [
        'kelas',
        'kompetensi_keahlian',
    ];

    protected $hidden;

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'kelas_id');
    }

}

?>
