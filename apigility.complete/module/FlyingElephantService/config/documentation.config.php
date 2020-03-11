<?php
return [
    'FlyingElephantService\\V1\\Rest\\PropulsionSystems\\Controller' => [
        'description' => 'Service provides information about propulsion systems in use.',
        'collection' => [
            'description' => 'View a list of propulsion systems offered.',
            'GET' => [
                'description' => 'Retrieve a list of propulsion systems.',
            ],
            'POST' => [
                'description' => 'Create a new propulsion system.',
            ],
        ],
        'entity' => [
            'GET' => [
                'description' => 'Retrieve a propulsion system.',
            ],
            'PATCH' => [
                'description' => 'Update a propulsion system',
            ],
            'PUT' => [
                'description' => 'Replace a propulsion system.',
            ],
            'DELETE' => [
                'description' => 'Delete a propulsion system.',
            ],
            'POST' => [
                'description' => 'Create a new propulsion system.',
            ],
        ],
    ],
];
