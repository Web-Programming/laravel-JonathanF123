<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    
    protected $tabel ="mahasiswas";
    protected $fillable = ['npm', 'nama','tempat_lahir', 'tanggal_lahir'];
    protected $guarded= [];
}
