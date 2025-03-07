<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'owner',
        'email'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
