<?php
putenv('ZF2_PATH='.__DIR__.'/../vendor/ZF2/library');
include_once __DIR__.'/../init_autoloader.php';
set_include_path(implode(PATH_SEPARATOR, [
    '.',
    __DIR__.'/../src',
    __DIR__.'/../vendor',
    get_include_path(),
]));
spl_autoload_register(function ($class) {
    $file = str_replace(['\\', '_'], DIRECTORY_SEPARATOR, $class).'.php';
    if (false === ($realpath = stream_resolve_include_path($file))) {
        return false;
    }
    include_once $realpath;
});
