<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis_kontak extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_kontak'
    ];
    protected $table = 'jenis_contact';

}
