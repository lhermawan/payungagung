<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisiMisi extends Model
{
    use HasFactory;

    protected $table = 't_visi_misi';
    protected $connection = 'mysql2';
    protected $fillable = [
        'visi',
        'misi',
    ];
}
