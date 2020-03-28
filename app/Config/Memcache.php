<?php

$host = getenv('MEMCACHED_HOST') ? getenv('MEMCACHED_HOST') : '127.0.0.1';
$port = getenv('MEMCACHED_PORT') ? getenv('MEMCACHED_PORT') : '11211';

return array(
    'stats_api' => 'Server',
    'slabs_api' => 'Server',
    'items_api' => 'Server',
    'get_api' => 'Server',
    'set_api' => 'Server',
    'delete_api' => 'Server',
    'flush_all_api' => 'Server',
    'connection_timeout' => '1',
    'max_item_dump' => '100',
    'refresh_rate' => 5,
    'memory_alert' => '80',
    'hit_rate_alert' => '90',
    'eviction_alert' => '0',
    'file_path' => 'Temp/',
    'servers' =>
        array(
            'Default' =>
                array(
                    $host . ':' . $port =>
                        array(
                            'hostname' => $host,
                            'port' => $port,
                        ),
                ),
        ),
);