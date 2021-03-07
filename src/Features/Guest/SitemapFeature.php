<?php

namespace OZiTAG\Tager\Backend\Seo\Features\Guest;

use OZiTAG\Tager\Backend\Core\Features\Feature;
use OZiTAG\Tager\Backend\Seo\Jobs\GetSitemapItemsJob;
use OZiTAG\Tager\Backend\Seo\Structures\SitemapItem;

class SitemapFeature extends Feature
{
    public function handle()
    {
        /** @var SitemapItem[] $items */
        $items = $this->run(GetSitemapItemsJob::class);

        $result = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
        foreach ($items as $item) {
            $xml = $item->toXml();
            if (!empty($xml)) {
                $result .= $item->toXml();
            }
        }
        $result .= '</urlset>';

        return response($result, 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
