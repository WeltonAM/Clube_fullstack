<?php

namespace app\core;

use app\core\Uri;
use app\core\MethodExtract;
use app\interfaces\AppInterface;

class AppExtract implements AppInterface
{
    private array $params = [];
    private int $sliceIndexStartFrom;

    public function controller():string
    {
        return ControllerExtract::extract();
    }
    
    public function method($controller):string
    {
        [$method, $sliceIndexStartFrom] = MethodExtract::extract($controller);

        $this->sliceIndexStartFrom = $sliceIndexStartFrom;

        return $method;
    }
    
    public function params():array
    {
        return ParamsExtract::extract($this->sliceIndexStartFrom);
    }
}