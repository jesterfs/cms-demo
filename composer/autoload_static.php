<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31359dd9b95ad757a4b28bb891a1e654
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31359dd9b95ad757a4b28bb891a1e654::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31359dd9b95ad757a4b28bb891a1e654::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit31359dd9b95ad757a4b28bb891a1e654::$classMap;

        }, null, ClassLoader::class);
    }
}
