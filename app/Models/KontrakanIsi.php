<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontrakanIsi extends Model
{
    use HasFactory;

    protected $table = 'kontrakan_isis';

    protected $fillable = [
        'kontrakan_detail_id',
        'nik',
        'nama',
    ];

    /**
     * Get the kontrakan_detail that owns the KontrakanIsi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontrakan_detail(): BelongsTo
    {
        return $this->belongsTo(KontrakanDetail::class);
    }
}
