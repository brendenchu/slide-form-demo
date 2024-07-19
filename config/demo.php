<?php

return [
    // Super Admin
    'super_admin_name' => env('SUPER_ADMIN_NAME', 'Super Admin'),
    'super_admin_email' => env('SUPER_ADMIN_EMAIL', 'test_super_admin@example.com'),
    'super_admin_password' => env('SUPER_ADMIN_PASSWORD', 'password'),

    // Admin
    'admin_name' => env('ADMIN_NAME', 'Admin'),
    'admin_email' => env('ADMIN_EMAIL', 'test_admin@example.com'),
    'admin_password' => env('ADMIN_PASSWORD', 'password'),

    // Consultant
    'consultant_name' => env('CONSULTANT_NAME', 'Consultant'),
    'consultant_email' => env('CONSULTANT_EMAIL', 'test_consultant@example.com'),
    'consultant_password' => env('CONSULTANT_PASSWORD', 'password'),

    // Client
    'client_name' => env('CLIENT_NAME', 'Client'),
    'client_email' => env('CLIENT_EMAIL', 'test_client@example.com'),
    'client_password' => env('CLIENT_PASSWORD', 'password'),
];
