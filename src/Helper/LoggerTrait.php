<?php
/**
 * Created by PhpStorm.
 * User: Yassine
 * Date: 01/06/2018
 * Time: 12:21
 */

namespace App\Helper;


use Psr\Log\LoggerInterface;

trait LoggerTrait
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @required
     */
    public function setLogger(LoggerInterface $logger){
        $this->logger = $logger;
    }

    public function logInfo(string $message, array $context = []){
        if($this->logger){
            $this->logger->info($message, $context);
        }
    }


}