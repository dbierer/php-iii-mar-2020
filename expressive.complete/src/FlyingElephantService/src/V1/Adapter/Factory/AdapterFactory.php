<?php
namespace FlyingElephantService\V1\Adapter\Factory;

use Zend\Db\Adapter\Adapter;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class AdapterFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('flying_elephant_adapter_config');
        return new Adapter($config);
    }
}
