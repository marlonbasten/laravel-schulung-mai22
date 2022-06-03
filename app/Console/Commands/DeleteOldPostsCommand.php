<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class DeleteOldPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Löscht Posts die älter als 24h sind.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Post::withTrashed()->where('created_at', '<', now()->subDay())->get()->each->forceDelete();

        return 0;
    }
}
