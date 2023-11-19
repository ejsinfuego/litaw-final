<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Theses extends Model
{
    use HasFactory;
    use Searchable;

    
     public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'metakeys' => $this->metakeys,
        ];
    }
    
     protected $fillable = [
        'title',
        'abstract',
        'metakeys',
        'filename',
        'course_id',
        'college_id',
        'year_id',
        'authors[]',
        'approved',
        'interactions_id',
    ];

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function authorsHasTheses(): HasManyThrough {
        return $this->hasManyThrough(Authors::class, ThesesHasAuthors::class, 'author_id', 'id', 'author_id', 'id');
    } 

    public function theses(): HasMany {
        return $this->hasMany(User::class);
    }

    public function authors(): BelongsToMany {
        return $this->belongsToMany(Authors::class, 'theses_has_authors', 'theses_id', 'author_id')->withTimestamps();
    }

    public function course(): BelongsTo {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function college(): BelongsTo {
        return $this->belongsTo(College::class, 'college_id');
    }

    public function year(): BelongsTo {
        return $this->belongsTo(Year::class, 'year_id');
    }

    public function views(): HasMany {
        return $this->hasMany(ViewedTheses::class);
    }

    public function likes(): HasMany {
        return $this->hasMany(LikedTheses::class);
    }

}
