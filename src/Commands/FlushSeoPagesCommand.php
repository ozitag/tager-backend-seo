<?php

namespace OZiTAG\Tager\Backend\Seo\Commands;

use Illuminate\Console\Command;

class FlushSeoPagesCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'tager:seo-flush';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync SEO pages in DB with config';

    public function handle()
    {
        $pages = config()->get('filestorage.pages');

        echo 'Tager SEO - It works, SEO config:';
        print_r($pages);
        exit;
    }
}