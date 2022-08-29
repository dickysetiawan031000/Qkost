<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KontrakanDetail extends Model
{
    use HasFactory;

    protected $table = 'kontrakan_details';

    protected $fillable = [
        'kontrakan_id',
        'nomor',
        'status'
    ];

    /**
     * Get the kontrakan that owns the KontrakanDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontrakan(): BelongsTo
    {
        return $this->belongsTo(Kontrakan::class, 'kontrakan_id');
    }

    /**
     * Get all of the kontrakan_isi for the KontrakanDetail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function kontrakan_isi(): HasMany
    // {
    //     return $this->hasMany(KontrakanIsi::class);
    // }
}
