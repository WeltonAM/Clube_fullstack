<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb17bedea4d185234c7ccd18c69ac0dc
{
    public static $files = array (
        '320cde22f66dd4f5d3fd621d3e88b98f' => __DIR__ . '/..' . '/symfony/polyfill-ctype/bootstrap.php',
        '0e6d7bf4a5811bfa5cf40c5ccd6fae6a' => __DIR__ . '/..' . '/symfony/polyfill-mbstring/bootstrap.php',
        'a4a119a56e50fbb293281d9a48007e0e' => __DIR__ . '/..' . '/symfony/polyfill-php80/bootstrap.php',
        'ff6b4dc42151b900ffa538013dd668f9' => __DIR__ . '/../..' . '/app/helpers/constants.php',
        '40cdf5859ba16811f2c6958ea2c2b139' => __DIR__ . '/../..' . '/app/router/router.php',
        '2167ec012c94ce7e4842b738f56a38dc' => __DIR__ . '/../..' . '/app/core/controller.php',
        '963bfeca2a23b5529f2096e68052cef6' => __DIR__ . '/../..' . '/app/database/connect.php',
        '291cc6d825c4d09fb34aa033615b4cf8' => __DIR__ . '/../..' . '/app/database/queries.php',
        'ee77845031dcda73e13a7b673f933e0b' => __DIR__ . '/../..' . '/app/helpers/redirect.php',
        'd1212457e2738dbef59380db38bb045f' => __DIR__ . '/../..' . '/app/helpers/email.php',
        '86bf89571801980a7c4abf4c239b1900' => __DIR__ . '/../..' . '/app/helpers/flash.php',
        'deffddcf3157ea9d831b50caa0344b2b' => __DIR__ . '/../..' . '/app/helpers/sessions.php',
        '527ffb5c9d57c388e14816a544bac456' => __DIR__ . '/../..' . '/app/helpers/validate.php',
        '5348f8b747605c4f58d3977a60dae8bb' => __DIR__ . '/../..' . '/app/helpers/validations.php',
        '30862e4eb689a23f4581c3e6bc63b193' => __DIR__ . '/../..' . '/app/helpers/helpers.php',
        'b012cd3488a80f36aa21f76cec26b9d3' => __DIR__ . '/../..' . '/app/helpers/old.php',
        '59f0d3005a272db5f54740d60243823f' => __DIR__ . '/../..' . '/app/helpers/csrf.php',
    );

    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Php80\\' => 23,
            'Symfony\\Polyfill\\Mbstring\\' => 26,
            'Symfony\\Polyfill\\Ctype\\' => 23,
        ),
        'P' => 
        array (
            'PhpOption\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'L' => 
        array (
            'League\\Plates\\' => 14,
        ),
        'G' => 
        array (
            'GrahamCampbell\\ResultType\\' => 26,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
            'Doctrine\\Inflector\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'Symfony\\Polyfill\\Php80\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php80',
        ),
        'Symfony\\Polyfill\\Mbstring\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-mbstring',
        ),
        'Symfony\\Polyfill\\Ctype\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-ctype',
        ),
        'PhpOption\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoption/phpoption/src/PhpOption',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'League\\Plates\\' => 
        array (
            0 => __DIR__ . '/..' . '/league/plates/src',
        ),
        'GrahamCampbell\\ResultType\\' => 
        array (
            0 => __DIR__ . '/..' . '/graham-campbell/result-type/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
        'Doctrine\\Inflector\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/inflector/lib/Doctrine/Inflector',
        ),
    );

    public static $classMap = array (
        'Attribute' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Attribute.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'PhpToken' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/PhpToken.php',
        'Stringable' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/Stringable.php',
        'UnhandledMatchError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/UnhandledMatchError.php',
        'ValueError' => __DIR__ . '/..' . '/symfony/polyfill-php80/Resources/stubs/ValueError.php',
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
