<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2526f99fcde4bd1c18e65ecc02812fb
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'LINE\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'LINE\\' => 
        array (
            0 => __DIR__ . '/..' . '/linecorp/line-bot-sdk/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2526f99fcde4bd1c18e65ecc02812fb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2526f99fcde4bd1c18e65ecc02812fb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
