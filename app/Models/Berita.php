<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 't_berita';

    // Specify the primary key (if it's not 'id')
    protected $primaryKey = 'id';
    protected $connection = 'mysql2';
    // Specify which attributes are mass assignable
    protected $fillable = [
        'heading',
        'judul',
        'deskripsi',
        'tanggal',
        'image',
    ];

    // You can define date casting if needed
    protected $dates = [
        'tanggal',
    ];
}
