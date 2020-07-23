<?php

namespace Devferoxide\Stree\Service;

require __DIR__ . '/../Support/autoload.php';

use Illuminate\Support\Str as BaseStr;

class Str extends BaseStr
{
    public function __call($method, $arguments)
    {
        return call_user_func_array('Str::' . $method, $arguments);
    }
}