<?php

namespace App\Jobs;

use App\Models\Movie;
use Illuminate\Support\Facades\Http;
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
        $response = Http::post('http://localhost:11434/api/embeddings', [
            'model' => 'nomic-embed-text',
            'prompt' => $this->movie->overview
        ]);

        $data = $response->json();

        $this->movie->update([
            'plot_embedding' => $data['embedding']
        ]);
    }
}
