<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\News;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class savejson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(News $news, Category $category)
    {
        Storage::disk('local')->put('news.json', json_encode($news->getNews(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        Storage::disk('local')->put('categories.json', json_encode($category->getCategories(), JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));

        return 0;
    }
}
