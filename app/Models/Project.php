<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_siswa',
        'namaproject',
        'fotoproject',
        'deskripsi',
        'tanggal'
    ];

    protected $table = 'project';
    public function siswa(){
        return $this->belongsTo('App/Models/Siswa', 'id_siswa','id');
    }
}
