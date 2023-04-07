<?php

$databases['default']['default'] = array(
    'database' => 'mariadb',
    'username' => 'mariadb',
    'password' => 'mariadb',
    'prefix' => '',
    'host' => 'database.telematica.tech',
    'port' => '3306',
    'namespace' => 'Drupal\\mysql\\Driver\\Database\\mysql',
    'driver' => 'mysql',
    'autoload' => 'core/modules/mysql/src/Driver/Database/mysql/',
);
$settings['config_sync_directory'] = 'sites/default/files/config_tBpgt5EjVTx7Hub0-y27i6kaC1TPkU2iry5--XEPpxTtsO0g04RLINjMzBB7DlamKiaUJ179PQ/sync';


$settings['reverse_proxy'] = TRUE;
$settings['reverse_proxy_addresses'] = array($_SERVER['REMOTE_ADDR']);
$settings['trusted_host_patterns'] = [
    '^telematica\.tech$',
    '^.+\.telematica\.tech$'
];
