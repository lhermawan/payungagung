<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapakdesa extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 't_lapakdesa';

    // Specify the primary key (if it's not 'id')
    protected $primaryKey = 'id';
    protected $connection = 'mysql2';
    // Specify which attributes are mass assignable
    protected $fillable = [
        'nama_produk',
        'harga',
        'kategori',
        'deskripsi',
        'mitra',
        'link_wa',
        'link_maps',
        'image',
    ];

    // Specify attributes that should be cast to native types
    protected $casts = [
        'harga' => 'decimal:2',
    ];
}
