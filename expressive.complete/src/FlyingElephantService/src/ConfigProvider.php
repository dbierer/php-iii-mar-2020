<?php
namespace FlyingElephantService;

use FlyingElephantService\Handler;
use FlyingElephantService\Middleware;
use FlyingElephantService\V1\Model as FSM;
use FlyingElephantService\V1\Rest\PropulsionSystems as PPS;


/**
 * The configuration provider for the App module
 *
 * @see https://docs.zendframework.com/zend-component-installer/
 */
class ConfigProvider
{
    /**
     * Returns the configuration array
     *
     * To add a bit of a structure, each section is defined in a separate
     * method which returns an array with its configuration.
     *
     */
    public function __invoke() : array
    {
        $config = $this->getDependencies();
        return [
            'dependencies' => $config,
        ];
    }

    /**
     * Returns the container dependencies
     */
    public function getDependencies() : array
    {
        return [
			'aliases' => [
				'Mapper' => FSM\ArrayMapper::class,
				//'Mapper' => FSM\TableGateway::class,
			],
            'factories'  => [
				FSM\ArrayMapper::class => FSM\ArrayMapperFactory::class,
				FSM\TableGateway::class => FSM\TableGatewayFactory::class,
				FSM\TableGatewayMapper::class => FSM\TableGatewayMapperFactory::class,
				PPS\PropulsionSystemsResource::class => PPS\PropulsionSystemsResourceFactory::class,
				Handler\FlyingElephantHandler::class => Handler\FlyingElephantHandlerFactory::class,
				Middleware\UuidCheckMiddleware::class => Middleware\UuidCheckMiddlewareFactory::class,
				Middleware\AuthCheckMiddleware::class => Middleware\AuthCheckMiddlewareFactory::class,
            ],
        ];
    }

}
