<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Authors extends Model
{
    use HasFactory;

    public function toSearchableArray()
    {
        return [
            'author' => $this->name,
        ];
    }

    protected $fillable = [
        'author',
        'email',
       
    ];

    public function user(): hasMany {
        return $this->hasMany(User::class);
    }

    public function theses(): BelongsToMany {
        return $this->belongsToMany(theses::class);
    }

}
