<?php
/**
 * Created by PhpStorm.
 * User: schmidfl
 * Date: 29.10.2018
 * Time: 13:12
 */

namespace App\Helper;

use Psr\Log\LoggerInterface;

trait LoggerTrait {

    /**
     * @var LoggerInterface|null
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     * @required
     */
    public function setLogger(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    private function logInfo (string $message, array $context=[]){
        if($this->logger) {
            $this->logger->info($message, $context);
        }
    }
}