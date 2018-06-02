<?php

namespace App\Twig;

use App\Services\MarkdownHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{

    private $markdownHelper;

    public function __construct(MarkdownHelper $markdownHelper)
    {
        $this->markdownHelper = $markdownHelper;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('cached_markdown', [$this, 'processMarkdown'], ['is_safe' => ['html']]),
        ];
    }


    /**
     * @param $value
     * @return string
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function processMarkdown($value)
    {
        ;
        return $this->markdownHelper->parse($value);
    }
}
