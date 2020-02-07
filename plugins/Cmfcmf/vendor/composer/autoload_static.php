<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf2de1c2e48511e69d1e3d0857c96c439
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Cmfcmf\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Cmfcmf\\' => 
        array (
            0 => __DIR__ . '/..' . '/cmfcmf/openweathermap-php-api/Cmfcmf',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf2de1c2e48511e69d1e3d0857c96c439::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf2de1c2e48511e69d1e3d0857c96c439::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
