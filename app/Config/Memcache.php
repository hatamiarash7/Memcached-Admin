<?php

$host = getenv('MEMCACHED_HOST') ? getenv('MEMCACHED_HOST') : '127.0.0.1';
$port = getenv('MEMCACHED_PORT') ? getenv('MEMCACHED_PORT') : '11211';

$servers = array(
    'Default' => array(
        $host . ':' . $port => array(
            'hostname' => $host,
            'port'     => $port
        )
    )
);

$hosts = explode(",", $host);

if (count($hosts) > 1) {
    $servers = [];
    foreach ($hosts as $host) {
        $servers['Default'][$host] = [
            'hostname' => parse_url($host, PHP_URL_HOST) ?: $host,
            'port'     => parse_url($host, PHP_URL_PORT) ?: $port
        ];
    }
}

error_reporting(E_ALL ^ E_DEPRECATED);

return array(
    'stats_api'          => 'Server',
    'slabs_api'          => 'Server',
    'items_api'          => 'Server',
    'get_api'            => 'Server',
    'set_api'            => 'Server',
    'delete_api'         => 'Server',
    'flush_all_api'      => 'Server',
    'connection_timeout' => '1',
    'max_item_dump'      => '100',
    'refresh_rate'       => 5,
    'memory_alert'       => '80',
    'hit_rate_alert'     => '90',
    'eviction_alert'     => '0',
    'file_path'          => 'Temp/',
    'servers'            => $servers
);
