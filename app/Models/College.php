<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Scout\Searchable;

class College extends Model
{
    use HasFactory;
    use Searchable;

    public function toSearchableArray()
    {
        return [
            'college' => $this->college,
        ];
    }

    protected $fillable = [
        'college'
       
    ];

    public function theses(): HasMany {
        return $this->hasMany(theses::class);
    }
}
