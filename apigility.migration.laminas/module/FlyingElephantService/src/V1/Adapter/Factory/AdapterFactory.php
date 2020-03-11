<?php
namespace FlyingElephantService\V1\Adapter\Factory;

use Laminas\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Laminas\ServiceManager\Factory\FactoryInterface;

class AdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Adapter($container->get('flying_elephant_adapter_config'));
    }
}
