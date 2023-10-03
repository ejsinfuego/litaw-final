<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThesesHasAuthors extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'theses_id'
       
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function theses(): HasMany {
        return $this->hasMany(theses::class);
    }

    public function authors(): HasMany {
        return $this->hasMany(Authors::class);
    }

}

