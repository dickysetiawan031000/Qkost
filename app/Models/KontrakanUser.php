<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KontrakanUser extends Model
{
    use HasFactory;

    protected $table = 'kontrakan_users';

    protected $fillable = [
        'user_id',
        'kontrakan_id',
        'harga',
        // 'transaksi_id',
        // 'pembayaran_ke',
        // 'jatuh_tempo',
    ];

    /**
     * Get the user that owns the KontrakanUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the kontrakan that owns the KontrakanUser
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kontrakan(): BelongsTo
    {
        return $this->belongsTo(Kontrakan::class);
    }

    // public function tagihan(): BelongsTo
    // {
    //     return $this->belongsTo(Tagihan::class);
    // }
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
