<?php

namespace OZiTAG\Tager\Backend\Seo\Contracts;

use OZiTAG\Tager\Backend\Seo\Structures\SitemapItem;

interface ISitemapHandler
{
    /** @return SitemapItem[] */
    public function handle();
}
