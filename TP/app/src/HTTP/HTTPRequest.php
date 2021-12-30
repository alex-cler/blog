<?php
namespace APP\HTTP;

class HTTPRequest
{
    public function cookieData($key)
    {
        return $_COOKIE[$key] ?? null;
    }

    public function cookieExists(string $key)
    {
        return isset($_COOKIE[$key]);
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function requestURI()
    {
        return $_SERVER['REQUEST_URI'];
    }
}
