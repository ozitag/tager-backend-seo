<?php

namespace OZiTAG\Tager\Backend\Seo\Jobs;

use OZiTAG\Tager\Backend\Core\Jobs\Job;
use OZiTAG\Tager\Backend\Seo\Structures\SitemapItem;
use OZiTAG\Tager\Backend\Seo\TagerSeo;

class GetSitemapItemsJob extends Job
{
    public function handle()
    {
        $handlers = TagerSeo::getSitemapHandlers();

        $result = [];

        foreach ($handlers as $handler) {
            $handlerResult = $handler->handle();

            foreach ($handlerResult as $item) {
                if (!empty($item->url)) {
                    $result[$item->url] = $item;
                }
            }
        }

        return array_values($result);
    }
}
