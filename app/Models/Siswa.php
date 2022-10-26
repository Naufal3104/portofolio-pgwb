<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'email',
        'alamat',
        'jk',
        'foto',
        'about'
    ];

    protected $table = 'siswa';
    public function kontak(){
        return $this->hasMany(Kontak::class, 'id_siswa', 'id');
    }
    public function project(){
        return $this->hasMany(Project::class, 'id_siswa','id');
    }
}
