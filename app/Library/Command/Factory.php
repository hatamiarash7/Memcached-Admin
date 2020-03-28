<?php

/**
 * Factory for communication with Memcache Server
 */
class Library_Command_Factory
{
    private static $_object = array();

    # No explicit call of constructor
    private function __construct()
    {
    }

    # No explicit call of clone()
    private function __clone()
    {
    }

    /**
     * Accessor to command class instance by command type
     *
     * @param String $command Type of command
     *
     * @return void
     */
    public static function instance($command)
    {
        # Importing configuration
        $_ini = Library_Configuration_Loader::singleton();

        # Instance does not exists
        if (!isset(self::$_object[$_ini->get($command)]) || ($_ini->get($command) != 'Server')) {
            # Switching by API
            switch ($_ini->get($command)) {
                case 'Memcache':
                    # PECL Memcache API
                    require_once 'Memcache.php';
                    self::$_object['Memcache'] = new Library_Command_Memcache();
                    break;

                case 'Memcached':
                    # PECL Memcached API
                    require_once 'Memcached.php';
                    self::$_object['Memcached'] = new Library_Command_Memcached();
                    break;

                case 'Server':
                default:
                    # Server API (eg communicating directly with the memcache server)
                    require_once 'Server.php';
                    self::$_object['Server'] = new Library_Command_Server();
                    break;
            }
        }
        return self::$_object[$_ini->get($command)];
    }

    /**
     * Accessor to command class instance by type
     *
     * @param $api
     * @return void
     */
    public static function api($api)
    {
        # Instance does not exists
        if (!isset(self::$_object[$api]) || ($api != 'Server')) {
            # Switching by API
            switch ($api) {
                case 'Memcache':
                    # PECL Memcache API
                    require_once 'Memcache.php';
                    self::$_object['Memcache'] = new Library_Command_Memcache();
                    break;

                case 'Memcached':
                    # PECL Memcached API
                    require_once 'Memcached.php';
                    self::$_object['Memcached'] = new Library_Command_Memcached();
                    break;

                case 'Server':
                default:
                    # Server API (eg communicating directly with the memcache server)
                    require_once 'Server.php';
                    self::$_object['Server'] = new Library_Command_Server();
                    break;
            }
        }
        return self::$_object[$api];
    }
}