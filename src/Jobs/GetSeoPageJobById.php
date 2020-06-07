<?php

namespace OZiTAG\Tager\Backend\Seo\Jobs;

use OZiTAG\Tager\Backend\Seo\Repositories\SeoPageRepository;

class GetSeoPageJobById
{
    /** @var integer */
    private $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle(SeoPageRepository $repository)
    {
        return $repository->find($this->id);
    }
}
