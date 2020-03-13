<?php
namespace FlyingElephantService\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Server\RequestHandlerInterface;
use FlyingElephantService\V1\Rest\PropulsionSystems\PropulsionSystemsResource;

class FlyingElephantHandlerFactory
{
    public function __invoke(ContainerInterface $container) : RequestHandlerInterface
    {
		$resource = $container->get(PropulsionSystemsResource::class);
        return new FlyingElephantHandler($resource);
    }
}
