<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5e3d4f767b4a5de082227497f29a73ff
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Vape\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Vape\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit5e3d4f767b4a5de082227497f29a73ff::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5e3d4f767b4a5de082227497f29a73ff::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5e3d4f767b4a5de082227497f29a73ff::$classMap;

        }, null, ClassLoader::class);
    }
}
