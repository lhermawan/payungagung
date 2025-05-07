<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $table = 't_penduduk';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    protected $connection = 'mysql2';
    
    protected $fillable = [
        'nik',
        'no_kk',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'agama',
        'status_perkawinan',
        'pendidikan',
        'pekerjaan',
        'golongan_darah',
        'shdk',
        'bantuan',
        'kis',
        'ayah',
        'ibu',
        'kepala_keluarga'
    ];

    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'pekerjaan', 'id_pekerjaan');
    }

    public function kis()
    {
        return $this->belongsTo(KIS::class, 'kis', 'id_kis');
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class, 'bantuan', 'id_bantuan');
    }
}
