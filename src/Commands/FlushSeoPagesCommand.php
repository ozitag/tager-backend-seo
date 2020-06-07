<?php

namespace OZiTAG\Tager\Backend\Seo\Commands;

use Illuminate\Console\Command;
use OZiTAG\Tager\Backend\Seo\Models\SeoPage;
use OZiTAG\Tager\Backend\Seo\Repositories\SeoPageRepository;

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

    private function getPageNameByAlias($alias)
    {
        $result = str_replace('-', ' ', $alias);
        $result = str_replace('_', ' ', $alias);

        return trim(mb_strtoupper(mb_substr($alias, 0, 1)) . mb_substr($alias, 1));
    }

    public function handle(SeoPageRepository $repository)
    {
        $pages = config()->get('tager-seo.pages');

        foreach ($pages as $alias => $name) {
            if (is_numeric($alias)) {
                $alias = $name;
                $name = $this->getPageNameByAlias($alias);
            }

            $model = $repository->getByAlias($alias);
            if (!$model) {
                $model = new SeoPage();
                $model->page = $alias;
            }
            $model->name = $name;
            $model->save();
        }
    }
}
