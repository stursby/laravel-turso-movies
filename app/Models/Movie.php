<?php

namespace App\Models;

use App\Jobs\GenerateMovieEmbeddings;
use Illuminate\Database\Eloquent\Model;
use Libsql\Laravel\VectorCast;

class Movie extends Model
{
    protected $fillable = [
        'movie_id',
        'title',
        // 'genre',
        'release_year',
        'overview',
        'plot_embedding'
    ];

    protected $casts = [
        'movie_id' => 'integer',
        'release_year' => 'integer',
        'plot_embedding' => VectorCast::class
    ];

    protected static function booted(): void
    {
        self::created(static function(Movie $movie): void {
            GenerateMovieEmbeddings::dispatch($movie);
        });
    }
}
