<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf336aae56ddedf55d3e5a6b26581ae1e
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitf336aae56ddedf55d3e5a6b26581ae1e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf336aae56ddedf55d3e5a6b26581ae1e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf336aae56ddedf55d3e5a6b26581ae1e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
