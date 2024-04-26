<?php

namespace App\Console\Commands;

use App\Component\importDataHttpClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceHolderCommand extends Command
{
    protected $signature = 'import:json-place-holder';

    protected $description = 'Get data from json placeholder';

    public function handle(): void
    {
        $this->info("Start download posts ...\n");

        $transport = new ImportDataHttpClient();
        $response = $transport->client->request('GET', 'posts');

        $posts = json_decode($response->getBody()->getContents());

        foreach ($posts as $post) {
            Post::firstOrCreate(
                ['title' => $post->title],
                [
                    'title' => $post->title,
                    'description' => $post->body,
                    'likes' => 0,
                    'is_published' => false,
                    'category_id' => 3,
                ]
            );
        }

        $this->info("End download posts ...\n");
    }
}
