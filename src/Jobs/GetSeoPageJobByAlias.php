<?php

namespace OZiTAG\Tager\Backend\Seo\Jobs;

use OZiTAG\Tager\Backend\Seo\Repositories\SeoPageRepository;

class GetSeoPageJobByAlias
{
    /** @var string */
    private $alias;

    public function __construct($alias)
    {
        $this->alias = $alias;
    }

    public function handle(SeoPageRepository $repository)
    {
        return $repository->getByAlias($this->alias);
    }
}
