<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 30/05/2018
 * Time: 16:01
 */

namespace App\Services;


use Michelf\MarkdownInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Cache\Adapter\AdapterInterface;

class MarkdownHelper
{

    private $cache;
    private $markdown;
    private $logger;
    private $isDebug;

    public function __construct(AdapterInterface $cache, MarkdownInterface $markdown, LoggerInterface $markdownLogger, bool $isDebug)
    {
        $this->cache = $cache;
        $this->markdown = $markdown;
        $this->logger = $markdownLogger;
        $this->isDebug = $isDebug;
    }

    /**
     * @param string $source
     * @return string
     * @throws \Psr\Cache\InvalidArgumentException
     */
    public function parse(string $source): string
    {
        if(stripos($source, 'bacon') !== false){
            $this->logger->info('They are talkink about bacon again!');
        }

        if($this->isDebug){
            return $this->markdown->transform($source);
        }


        //Imagine that markdown demands a lot of resources to be executed ... no problem! use cache!
        //-- Create a new cache key
        $item = $this->cache->getItem('markdown_' . md5($source));
        //-- If there is not cache with the created key, then execute the markdown and save it in the cache
        if (!$item->isHit()) {
            $item->set($this->markdown->transform($source));
            $this->cache->save($item);
        }

        //-- Get content from cache :)
        return $item->get();
    }
}