<?php

namespace OZiTAG\Tager\Backend\Seo\Structures;

class ParamsTemplate
{
    protected string $name;

    protected array $variables;

    protected bool $hasOpenGraphImage;

    protected ?string $defaultPageTitle;

    protected ?string $defaultPageDescription;

    public function __construct(string $name, array $variables = [], bool $hasOpenGraphImage = false, ?string $defaultPageTitle = null, ?string $defaultPageDescription = null)
    {
        $this->name = $name;

        $this->variables = $variables;

        $this->hasOpenGraphImage = $hasOpenGraphImage;

        $this->defaultPageTitle = $defaultPageTitle;

        $this->defaultPageDescription = $defaultPageDescription;
    }

    private function render(string $template, array $variables, ?string $default)
    {
        if (empty($template)) {
            return $default;
        }

        foreach ($variables as $param => $value) {
            $template = str_replace('{{' . $param . '}}', $value, $template);
        }

        return $template;
    }

    public function renderPageTitle($variableValues = [])
    {
        return $this->render($this->defaultPageTitle, $variableValues, $this->defaultPageTitle);
    }

    public function renderPageDescription($variableValues = [])
    {
        return $this->render($this->defaultPageDescription, $variableValues, $this->defaultPageDescription);

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
        return $this->hasOpenGraphImage;
    }

    public function getDefaultPageTitle(): ?string
    {
        return $this->defaultPageTitle;
    }

    public function getDefaultPageDescription(): ?string
    {
        return $this->defaultPageDescription;
    }
}
