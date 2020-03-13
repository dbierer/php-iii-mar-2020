<?php
/**
 * Services config for Flying Elephant Service
 */
use Zend\Validator\{NotEmpty, Digits};
use Zend\Filter\StripTags;
// NOTE: "ZF" classes come from the "zfcampus/zf-mvc-auth" composer package
//       Adjust your composer.json file accordingly
use ZF\MvcAuth\Authentication\{HttpAdapter, OAuth2Adapter};
use Zend\Db\Adapter\Adapter;
use FlyingElephantService\V1\Rest\PropulsionSystems\{
    PropulsionSystemsResource,
    PropulsionSystemsEntity,
    PropulsionSystemsCollection
};
return [
    'documentation' => [
        PropulsionSystemsResource::class => [
            'description' => 'Service provides information about propulsion systems in use.',
            'collection' => [
                'description' => 'View list of propulsion systems offered.',
                'GET' => [
                    'description' => 'Retrieve a list of propulsion systems.',
                ],
                'POST' => [
                    'description' => 'Create a new propulsion system',
                ],
            ],
            'entity' => [
                'GET' => [
                    'description' => 'Retrieve a propulsion system',
                ],
                'PATCH' => [
                    'description' => 'Update a propulsion system',
                ],
                'PUT' => [
                    'description' => 'Replace a propulsion system',
                ],
                'DELETE' => [
                    'description' => 'Delete a propulsion system',
                ],
                'POST' => [
                    'description' => 'Create a new propulsion system',
                ],
            ],
        ],
    ],

    'zf-versioning' => [
        'uri' => [
            0 => 'fes-rest-propulsion-systems',
        ],
    ],
    'zf-rest' => [
        'route_name' => 'fes-rest-propulsion-systems',
        'route_identifier_name' => 'propulsion_systems_id',
        'entity_class' => PropulsionSystemsEntity::class,
        'collection_class' => PropulsionSystemsCollection::class,
        'collection_name' => 'propulsion_systems',
        'entity_http_methods' => [
            0 => 'GET',
            1 => 'PATCH',
            2 => 'PUT',
            3 => 'DELETE',
            4 => 'POST',
        ],
        'collection_http_methods' => [
            0 => 'GET',
            1 => 'POST',
        ],
        'collection_query_whitelist' => [],
        'page_size' => 25,
        'page_size_param' => null,
        'service_name' => 'PropulsionSystems',

    ],
    'zf-content-negotiation' => [
        'controllers' => [
            PropulsionSystemsResource::class => 'HalJson',
        ],
        'accept_whitelist' => [
            PropulsionSystemsResource::class => [
                0 => 'application/vnd.flying-elephant-service.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            PropulsionSystemsResource::class => [
                0 => 'application/vnd.flying-elephant-service.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            PropulsionSystemsEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'fes-rest-propulsion-systems',
                'route_identifier_name' => 'propulsion_systems_id',
                'hydrator' => \Zend\Hydrator\ObjectProperty::class,
            ],
            PropulsionSystemsCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'fes-rest-propulsion-systems',
                'route_identifier_name' => 'propulsion_systems_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        PropulsionSystemsResource::class => [
            'input_filter' => 'FlyingElephantService\\V1\\Rest\\PropulsionSystems\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'FlyingElephantService\\V1\\Rest\\PropulsionSystems\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => NotEmpty::class,
                        'options' => [
                            'breakchainonfailure' => false,
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'Type',
                'description' => 'Volatile chemical',
                'field_type' => 'string',
                'error_message' => 'A value is required',
            ],
            1 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => NotEmpty::class,
                        'options' => [],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => StripTags::class,
                        'options' => [],
                    ],
                ],
                'description' => 'The propellant chemical',
                'name' => 'Propellant',
                'field_type' => 'string',
                'error_message' => 'A value is required',
            ],
            2 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => Digits::class,
                        'options' => [],
                    ],
                ],
                'filters' => [],
                'name' => 'timestamp',
                'field_type' => 'timestamp',
                'description' => 'A timestamp placeholder',
                'error_message' => 'Invalid timestamp',
            ],
        ],
    ],
    'propulsion' => [
        'array_mapper_path' => __DIR__ . '/../../data/propulsion.php',
        'table' => 'propellant',
        'db' => 'flying_elephant_adapter',
    ],
    'dependencies' => [
        'aliases' => [
            // Zend Expressive creates this service using "config" (vs. "Config" in ZF2 and ZF3)
            'Config' => 'config',
        ],
        'factories' => [
            'flying_elephant_adapter' => function ($container) {
                return new Adapter($container->get('flying_elephant_adapter_config'));
            },
        ],
        'services' => [
            'flying_elephant_adapter_config' => [
                'driver'   => 'PDO',
                'dsn'      => 'mysql:host=localhost;dbname=flying_elephant',
                'username' => 'vagrant',
                'password' => 'vagrant',
                'options'  => [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
            ],
            'propulsion' => [
                'array_mapper_path' => __DIR__ . '/../../data/propulsion.php',
                'table' => 'propellant',
                'db' => 'flying_elephant_adapter',
            ],
            'zf-mvc-auth' => [
                'authorization' => [
                    PropulsionSystemsResource::class => [
                        'collection' => [
                            'GET' => true,
                            'POST' => true,
                            'PUT' => false,
                            'PATCH' => false,
                            'DELETE' => false,
                        ],
                        'entity' => [
                            'GET' => true,
                            'POST' => true,
                            'PUT' => true,
                            'PATCH' => true,
                            'DELETE' => true,
                        ],
                    ],
                ],
                'authentication' => [
                    'adapters' => [
                        'propulsion-systems.basic' => [
                            'adapter' => HttpAdapter::class,
                            'options' => [
                                'accept_schemes' => [
                                    0 => 'basic',
                                ],
                                'realm' => 'api',
                                'htpasswd' => '/home/vagrant/Zend/workspaces/defaultworkspace/apigility.complete/data/htpasswd',
                            ],
                        ],
                        'propulsion-systems.oauth2' => [
                            'adapter' => OAuth2Adapter::class,
                            'storage' => [
                                'adapter' => PDO::class,
                                'dsn' => 'mysql:host=localhost;dbname=oauth2',
                                'route' => '/oauth',
                                'username' => 'vagrant',
                                'password' => 'vagrant',
                                'options' => [
                                    1002 => 'SET NAMES utf8',
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
