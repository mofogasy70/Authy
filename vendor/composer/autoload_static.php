<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5ecff78d3dc04d5b23f6a89431f8659c
{
    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'youngdev\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'youngdev\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5ecff78d3dc04d5b23f6a89431f8659c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5ecff78d3dc04d5b23f6a89431f8659c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5ecff78d3dc04d5b23f6a89431f8659c::$classMap;

        }, null, ClassLoader::class);
    }
}
