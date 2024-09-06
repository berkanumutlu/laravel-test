<?php

namespace App\Console\Commands;

use App\Models\Article;
use Illuminate\Console\Command;

class ElasticsearchArticles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'elasticsearch:index-articles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Indexing articles for elasticsearch';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (app('elasticsearch')->indices()->exists(['index' => 'articles'])) {
            app('elasticsearch')->indices()->delete(['index' => 'articles']);
            $this->info('['.date('Y-m-d H:i:s').'] Articles index deleted.');
        }
        $articles = Article::all();
        foreach ($articles as $article) {
            $params = [
                'index' => 'articles',
                'id'    => $article->id,
                'body'  => $article->toArray()
            ];
            app('elasticsearch')->index($params);
        }
        $this->info('['.date('Y-m-d H:i:s').'] All articles have been indexed.');
    }
}
