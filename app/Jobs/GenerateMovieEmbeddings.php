<?php

namespace App\Jobs;

use App\Models\Movie;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateMovieEmbeddings implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public Movie $movie
    )
    {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // TODO: Generate plot embeddings
    }
}
