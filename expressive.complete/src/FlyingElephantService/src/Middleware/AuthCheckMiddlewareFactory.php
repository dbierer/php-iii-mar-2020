<?php
namespace FlyingElephantService\Middleware;

use Psr\Container\ContainerInterface;
use FlyingElephantService\V1\Rest\PropulsionSystems\PropulsionSystemsResource;

class AuthCheckMiddlewareFactory
{
    public function __invoke(ContainerInterface $container) : AuthCheckMiddleware
    {
        return new AuthCheckMiddleware($container->get(PropulsionSystemsResource::class), 
                                       $container->get('zf-mvc-auth'));
    }
}
