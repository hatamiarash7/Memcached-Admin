<?php
# Constants declaration
define('CURRENT_VERSION', '1.0');

# PHP < 5.3 Compatibility
if (!defined('ENT_IGNORE')) {
    define('ENT_IGNORE', 0);
}

# Auto loader
spl_autoload_register(function ($class) {
    require_once str_replace('_', DIRECTORY_SEPARATOR, $class) . '.php';
});
