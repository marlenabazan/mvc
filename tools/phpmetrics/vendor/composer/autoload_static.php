<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6f84ab4b5a2bd31be84422b7d023cbf1
{
    public static $files = array (
        '5f0e95b8df5acf4a92c896dc3ac4bb6e' => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PhpParser\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
    );

    public static $prefixesPsr0 = array (
        'H' => 
        array (
            'Hal\\' => 
            array (
                0 => __DIR__ . '/..' . '/phpmetrics/phpmetrics/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6f84ab4b5a2bd31be84422b7d023cbf1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6f84ab4b5a2bd31be84422b7d023cbf1::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit6f84ab4b5a2bd31be84422b7d023cbf1::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit6f84ab4b5a2bd31be84422b7d023cbf1::$classMap;

        }, null, ClassLoader::class);
    }
}