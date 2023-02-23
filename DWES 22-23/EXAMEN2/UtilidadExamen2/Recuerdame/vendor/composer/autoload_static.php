<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite8e7646b947792a9de6f060870b05ac5
{
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite8e7646b947792a9de6f060870b05ac5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite8e7646b947792a9de6f060870b05ac5::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite8e7646b947792a9de6f060870b05ac5::$classMap;

        }, null, ClassLoader::class);
    }
}
