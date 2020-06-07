<?php

namespace OZiTAG\Tager\Backend\Seo\Jobs;

use OZiTAG\Tager\Backend\Seo\Repositories\SeoPageRepository;

class GetSeoPageJob
{
    /** @var string */
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function handle(SeoPageRepository $repository)
    {
        return $repository->getByPageId($this->page);
    }
}
