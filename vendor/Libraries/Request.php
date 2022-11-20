<?php

namespace vendor\Libraries;

class Request
{
    public function field(string $name)
    {
        return $_REQUEST[$name] ?? null;
    }
}