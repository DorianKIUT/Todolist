<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit12928e38ba059d5626c5aa2b0d7030c5
{
    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mustache' => 
            array (
                0 => __DIR__ . '/..' . '/mustache/mustache/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit12928e38ba059d5626c5aa2b0d7030c5::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}