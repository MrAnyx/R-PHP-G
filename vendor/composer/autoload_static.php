<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite2688e60e8185a7bf7e46c8eb570b524
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/Class',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite2688e60e8185a7bf7e46c8eb570b524::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite2688e60e8185a7bf7e46c8eb570b524::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}