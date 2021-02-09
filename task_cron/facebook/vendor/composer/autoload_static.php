<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit354891075ad819fca49c80fd790e07f4
{
    public static $files = array (
        'c65d09b6820da036953a371c8c73a9b1' => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook/polyfills.php',
    );

    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
            'FacebookAds\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
        'FacebookAds\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/php-ads-sdk/src/FacebookAds',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit354891075ad819fca49c80fd790e07f4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit354891075ad819fca49c80fd790e07f4::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
