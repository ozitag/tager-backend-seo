<?php

namespace OZiTAG\Tager\Backend\Seo\Structures;

class ParamsTemplate
{
    protected bool $h1Enabled = false;

    protected ?string $defaultH1 = null;

    public function __construct(
        protected string       $name,
        protected ?array       $variables = [],
        protected bool         $openGraphImageEnabled = false,
        protected ?string      $defaultPageTitle = null,
        protected ?string      $defaultPageDescription = null,
        protected array|string $httpCacheNamespaces = [])
    {
    }

    public function httpCacheNamespaces(array|string $value)
    {
        $this->httpCacheNamespaces = $value;
        return $this;
    }

    public function enableH1()
    {
        $this->h1Enabled = true;
        return $this;
    }

    public function enableOpenGraphImage()
    {
        $this->openGraphImageEnabled = true;
        return $this;
    }

    public function defaultPageTitle(string $value)
    {
        $this->defaultPageTitle = $value;
        return $this;
    }

    public function defaultPageDescription(string $value)
    {
        $this->defaultPageDescription = $value;
        return $this;
    }

    public function defaultH1(string $value)
    {
        $this->defaultH1 = $value;
        return $this;
    }

    public function getVariables(): array
    {
        return $this->variables;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function hasOpenGraphImage(): bool
    {
        return $this->openGraphImageEnabled;
    }

    public function isH1Enabled(): bool
    {
        return $this->h1Enabled;
    }

    public function getDefaultPageTitle(): ?string
    {
        return $this->defaultPageTitle;
    }

    public function getDefaultPageDescription(): ?string
    {
        return $this->defaultPageDescription;
    }

    public function getDefaultH1(): ?string
    {
        return $this->defaultH1;
    }

    public function getHttpCacheNamespace(): array
    {
        return $this->httpCacheNamespaces
            ? (is_array($this->httpCacheNamespaces) ? $this->httpCacheNamespaces : [$this->httpCacheNamespaces])
            : [];
    }
}
