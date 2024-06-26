<?php

spl_autoload_register(function ($class) {
    require  $class .".php";
  });
class Middleware
{
    public const MAP = [
        'guest' => Guest::class,
        'admin' => Admin::class,
        'health_worker'=> HealthWorker::class,
        'patient' => Patient::class
    ];

    public static function resolve($key)
    {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key '{$key}'.");
        }

        (new $middleware)->handle();
    }
}