<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tagihan extends Model
{
    use HasFactory;

    protected $table = 'tagihans';

    protected $fillable = [
        'kontrakan_user_id',
        'transaksi_id',
        'jatuh_tempo',
        'pembayaran_ke',
    ];

    // public function kontrakan_user(): HasMany
    // {
    //     return $this->hasMany(KontrakanUser::class);
    // }

    public function kontrakan_user()
    {
        return $this->belongsTo(KontrakanUser::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }
}
