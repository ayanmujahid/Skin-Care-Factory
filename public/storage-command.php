<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Go to Laravel root directory
chdir('..');

// Include Composer's autoload
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel application
$app = require_once __DIR__ . '/../bootstrap/app.php';

// Create the Kernel and bootstrap the app
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap(); // ✅ IMPORTANT: Bootstraps the application

// Now run the Artisan command
\Illuminate\Support\Facades\Artisan::call('storage:link');

echo "✅ Storage link created successfully!";