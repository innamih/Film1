<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Director::class);
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class);
    }

    public function posters()
    {
        return $this->hasMany(Poster::class);
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function ratingsforchek()
    {
        return $this->hasMany(Rating::class)->where('status', 0);
    }
    public function ratings()
    {
        return $this->hasMany(Rating::class)->where('status', 1);
    }

    public function getRatingAttribute()
{
    return round($this->hasMany(Rating::class)->where('status', 1)->avg('rating'), 2);
}
}
