<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JenisKontrakan extends Model
{
    use HasFactory;

    protected $table = 'jenis_kontrakans';

    protected $fillable = [
        'kontrakan_id',
        'nama',
        'alamat',
        'harga'
    ];

    /**
     * Get all of the kontrakan for the JenisKontrakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function kontrakan(): HasMany
    {
        return $this->hasMany(Kontrakan::class);
    }
}
