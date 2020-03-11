<?php
/**
 * Table Gateway Class
 */
namespace FlyingElephantService\V1\Model;

use FlyingElephantService\V1\Rest\PropulsionSystems\PropulsionSystemsEntity as Entity;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\ResultSet\HydratingResultSet;
use Laminas\Db\TableGateway\TableGateway as ZFTableGateway;
use Laminas\Hydrator\ObjectPropertyHydrator;

/**
 * Custom TableGateway instance for Model
 *
 * Creates a HydratingResultSet seeded with an ObjectPropertyHydrator and Entity instance.
 */
class TableGateway extends ZFTableGateway
{
    /**
     * TableGateway constructor.
     * @param array|string|\Laminas\Db\Sql\TableIdentifier $table
     * @param AdapterInterface $adapter
     * @param null $features
     */
    public function __construct($table, AdapterInterface $adapter, $features = null)
    {
        $resultSet = new HydratingResultSet(new ObjectPropertyHydrator(), new Entity());
        return parent::__construct($table, $adapter, $features, $resultSet);
    }
}
