<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $table = 't_pekerjaan';
    protected $primaryKey = 'id_pekerjaan';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $fillable = [
        'id_pekerjaan',
        'nama'
    ];

    public function penduduks()
    {
        return $this->hasMany(Penduduk::class, 'pekerjaan', 'nama');
    }

}
