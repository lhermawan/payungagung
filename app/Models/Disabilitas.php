<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disabilitas extends Model
{
    use HasFactory;

    protected $table = 't_disabilitas';
    protected $primaryKey = 'id_disabilitas';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    protected $connection = 'mysql2';
    protected $fillable = [
        'nik',
        'kategori',
        'dusun'
    ];

    /**
     * Define the relationship with the Penduduk model.
     */
    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }
}
