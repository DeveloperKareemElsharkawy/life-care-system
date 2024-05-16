<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'dashboard' => 'r',
            'roles' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'pages' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'nationalities' => 'c,r,u,d',
            'nationalities_process_steps' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'workers' => 'c,r,u,d',
            'sliders' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'contacts' => 'r,u,d',
            'admin_settings' => 'r,u',
            'app_settings' => 'r,u',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
