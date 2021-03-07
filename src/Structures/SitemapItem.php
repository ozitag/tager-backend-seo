<?php

namespace OZiTAG\Tager\Backend\Seo\Structures;

use Carbon\Carbon;

class SitemapItem
{
    public ?string $url;

    public ?float $priority;

    public ?Carbon $lastMod;

    public ?string $changeFreq;

    public function __construct(?string $url, ?Carbon $lastMod = null, string $changeFreq = null, float $priority = null)
    {
        $this->url = $url ? (mb_substr($url, 0, 1) == '/' ? config('app.url') . $url : $url) : null;

        $this->priority = $priority;

        $this->lastMod = $lastMod;

        $this->changeFreq = $changeFreq;
    }

    public function toXml(): ?string
    {
        if (empty($this->url)) {
            return null;
        }

        $result = '<url><loc>' . $this->url . '</loc>';

        if (!empty($this->lastMod)) {
            $result .= '<lastmod>' . $this->lastMod->toW3cString() . '</lastmod>';
        }

        if (!empty($this->changeFreq)) {
            $result .= '<changefreq>' . $this->changeFreq . '</changefreq>';
        }

        if (!empty($this->priority)) {
            $result .= '<priority>' . $this->priority . '</priority>';
        }

        $result .= '</url>';

        return $result;
    }
}
