<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KIS extends Model
{
    use HasFactory;
    protected $table = 't_kis';
    protected $primaryKey = 'id_kis';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $fillable = [
        'id_kis',
        'jenis',
        'kategori',
        'keterangan'
    ];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'kis', 'jenis');
    }

}
