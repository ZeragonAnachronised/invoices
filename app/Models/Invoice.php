<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'executor',
        'executorId',
        'customer',
        'period',
        'description'
    ];

    protected $attributes = [
        'issued' => false
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
