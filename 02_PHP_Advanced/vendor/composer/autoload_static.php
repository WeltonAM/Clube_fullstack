<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3ea28644b83288b24290c4deb6f2de21
{
    public static $files = array (
        '08553373174aed5b2079e6334c2d2257' => __DIR__ . '/../..' . '/app/functions/custom.php',
        '0c48edfd83033889f779790f8f59dd48' => __DIR__ . '/../..' . '/app/functions/pages.php',
        '06e2cc845cd457b9c47e81e7c59d160b' => __DIR__ . '/../..' . '/app/functions/flash.php',
        '1a034cec71159224725114f89a820cf1' => __DIR__ . '/../..' . '/app/functions/validate.php',
        '832debbbcfeab8700db6cef00613e4fc' => __DIR__ . '/../..' . '/app/functions/email.php',
        '65c0c55b3706b128c0fd18b53f51385b' => __DIR__ . '/../..' . '/app/functions/database.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3ea28644b83288b24290c4deb6f2de21::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3ea28644b83288b24290c4deb6f2de21::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3ea28644b83288b24290c4deb6f2de21::$classMap;

        }, null, ClassLoader::class);
    }
}
