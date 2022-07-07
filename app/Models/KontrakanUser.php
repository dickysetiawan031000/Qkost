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
        'harga'
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
}
