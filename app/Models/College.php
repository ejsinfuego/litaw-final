<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class College extends Model
{
    use HasFactory;

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
        ];
    }

    protected $fillable = [
        'name'
       
    ];

    public function user(): hasMany {
        return $this->hasMany(User::class);
    }

    public function theses(): HasMany {
        return $this->hasMany(theses::class);
    }
}
