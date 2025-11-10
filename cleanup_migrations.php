<?php
// Run this script with: php cleanup_migrations.php
// It will remove the old admins migration from the migrations table.

use Illuminate\Database\Capsule\Manager as Capsule;

require __DIR__ . '/../vendor/autoload.php';

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST') ?: '127.0.0.1',
    'database'  => getenv('DB_DATABASE') ?: 'agri_fair_prices',
    'username'  => getenv('DB_USERNAME') ?: 'root',
    'password'  => getenv('DB_PASSWORD') ?: '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();

// Delete the old admins migration record
$migration = '2025_11_10_180001_create_admins_table.php';
Capsule::table('migrations')->where('migration', $migration)->delete();
echo "Deleted migration record: $migration\n";
