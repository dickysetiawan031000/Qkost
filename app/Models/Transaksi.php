<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksis';

    protected $fillable = [
        'transaction_status',
        'transaction_id',
        'order_id',
        'gross_amount',
        'payment_type',
        'payment_code',
        'pdf_url'
    ];

    public function kontrakan_user()
    {
        return $this->hasMany(KontrakanUser::class);
    }
    public function tagihan()
    {
        return $this->hasMany(Tagihan::class);
    }
}
