<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb1dd194d9a8334c020ecf72b5c481839
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb1dd194d9a8334c020ecf72b5c481839::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb1dd194d9a8334c020ecf72b5c481839::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb1dd194d9a8334c020ecf72b5c481839::$classMap;

        }, null, ClassLoader::class);
    }
}
