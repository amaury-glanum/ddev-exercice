<?php

namespace Els\Manager;

abstract class ApiBaseManager
{
    protected string $url;
    protected string $method;

    public function __construct($url, $method = "GET")
    {
        $this->method = $method;
        $this->url = $url;
    }
}
