<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ViewedTheses extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theses_id',
        'session_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function theses(): BelongsTo {
        return $this->belongsTo(Theses::class);
    }

    public function session(): BelongsTo {
        return $this->belongsTo(Session::class);
    }
}
