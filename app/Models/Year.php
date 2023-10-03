<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Year extends Model
{
    use HasFactory;


    use HasFactory;

    public function toSearchableArray()
    {
        return [
            'year' => $this->name,
        ];
    }

    protected $fillable = [
        'year'
       
    ];

    public function user(): hasMany {
        return $this->hasMany(User::class);
    }

    public function theses(): hasMany {
        return $this->hasMany(theses::class);
    }
}
