<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KontakKami extends Model
{
    use HasFactory;

    protected $table = 'kontakkamis';

    protected $fillable = [
        'nama',
        'no_telp',
        'email',
        'subjek',
        'desc'
    ];
}
