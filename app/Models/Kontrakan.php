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

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($kontrakan) { // before delete() method call this
            $kontrakan->kontrakan_detail()->delete();
            // do the rest of the cleanup...
        });
    }

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
    // public function user(): BelongsTo
    // {
    //     return $this->belongsTo(User::class, 'user_id');
    // }

    /**
     * Get the kontrakan_user associated with the Kontrakan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kontrakan_user(): HasOne
    {
        return $this->hasOne(KontrakanUser::class);
    }
}
