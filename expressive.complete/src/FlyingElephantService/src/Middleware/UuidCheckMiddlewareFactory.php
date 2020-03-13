<?php
namespace FlyingElephantService\Middleware;
use Psr\Container\ContainerInterface;

class UuidCheckMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : UuidCheckMiddleware
    {
        return new UuidCheckMiddleware();
    }
}
