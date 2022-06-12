<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kontrakan extends Model
{
    use HasFactory;

    protected $table = "kontrakans";

    protected $fillable = [
        'user_id',
        'jenis_kontrakan_id'
    ];

    /**
     * Get the kontrakan_detail associated with the Kontrakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kontrakan_detail(): HasOne
    {
        return $this->hasOne(KontrakanDetail::class);
    }

    /**
     * Get the jenis_kontrakan that owns the Kontrakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenis_kontrakan(): BelongsTo
    {
        return $this->belongsTo(JenisKontrakan::class, 'jenis_kontrakan_id');
    }
}
