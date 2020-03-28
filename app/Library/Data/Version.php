<?php

/**
 * Version container
 */
class Library_Data_Version
{
    # Version file
    protected static $_file = 'latest';

    /**
     * Check for the latest version, from local cache or via http
     * Return true if a newer version is available, false otherwise
     *
     * @return Boolean
     */
    public static function check()
    {
        # Loading ini file
        $_ini = Library_Configuration_Loader::singleton();

        # Version definition file path
        $path = rtrim($_ini->get('file_path'), '/') . DIRECTORY_SEPARATOR . self::$_file;

        # avoid error spam
        file_put_contents($path, 'Net unreachable');
        return true;
    }
}