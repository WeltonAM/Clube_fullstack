<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb17bedea4d185234c7ccd18c69ac0dc
{
    public static $files = array (
        'ff6b4dc42151b900ffa538013dd668f9' => __DIR__ . '/../..' . '/app/helpers/constants.php',
    );

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
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb17bedea4d185234c7ccd18c69ac0dc::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb17bedea4d185234c7ccd18c69ac0dc::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitcb17bedea4d185234c7ccd18c69ac0dc::$classMap;

        }, null, ClassLoader::class);
    }
}
