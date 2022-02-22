<?php

namespace OZiTAG\Tager\Backend\Seo\Structures;

use Carbon\Carbon;

class SitemapItem
{
    public ?string $url;

    public ?float $priority;

    public ?Carbon $lastMod;

    public ?string $changeFreq;

    private array $images = [];

    public function __construct(?string $url, ?Carbon $lastMod = null, string $changeFreq = null, float $priority = null)
    {
        $this->url = $url ? (str_starts_with($url, '/') ? config('app.url') . $url : $url) : null;
        if (str_ends_with($this->url, '/')) {
            $this->url = substr($this->url, 0, strlen($this->url) - 1);
        }

        $this->priority = $priority;

        $this->lastMod = $lastMod;

        $this->changeFreq = $changeFreq;
    }

    public function addImage(?string $url, ?string $caption = null)
    {
        if (!$url) return;

        $url = trim($url);

        $this->images[$url] = [
            'url' => $url,
            'caption' => $caption
        ];
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

        if (!empty($this->images)) {
            foreach (array_values($this->images) as $image) {
                $result .= '<image:image><image:loc>' . $image['url'] . '</image:loc>';

                if (!empty($image['caption'])) {
                    $result .= '<image:caption>' .
                        trim(preg_replace('/\s\s+/', ' ', $image['caption']))
                        . '</image:caption>';
                }

                $result .= '</image:image>';
            }
        }

        $result .= '</url>';

        return $result;
    }
}
