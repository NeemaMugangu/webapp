<?php
require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';

use Illuminate\Support\Facades\DB;

$app->make('Illuminate\\Contracts\\Console\\Kernel')->bootstrap();

DB::statement("DELETE FROM migrations WHERE migration LIKE '%buyers%'");

echo "Migration record for buyers deleted.\n";
