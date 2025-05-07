<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $table = 't_bantuan';
    protected $primaryKey = 'id_bantuan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $fillable = [
        'id_bantuan',
        'jenis',
    ];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'bantuan', 'jenis');
    }

}
