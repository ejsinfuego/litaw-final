<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'theses_id',
        'likes',
        'comment'

    ];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function theses() {
        return $this->belongsTo(Theses::class);
    }

}
