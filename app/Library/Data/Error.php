<?php

/**
 * Error container
 */
class Library_Data_Error
{
    private static $_errors = array();

    /**
     * Add an error to the container
     * Return true if successful, false otherwise
     *
     * @param String $error Error message
     *
     * @return Boolean
     */
    public static function add($error)
    {
        return array_push(self::$_errors, $error);
    }

    /**
     * Return last Error message
     *
     * @return Mixed
     */
    public static function last()
    {
        return (isset(self::$_errors[count(self::$_errors) - 1])) ? self::$_errors[count(self::$_errors) - 1] : null;
    }

    /**
     * Return errors count
     *
     * @return int
     */
    public static function count()
    {
        return count(self::$_errors);
    }
}
