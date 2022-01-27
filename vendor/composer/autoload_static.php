<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbaab981275154c3f4b2a761a04d348aa
{
    public static $prefixLengthsPsr4 = array (
        'v' => 
        array (
            'vasco\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'vasco\\' => 
        array (
            0 => __DIR__ . '/..' . '/vasco/php-classes/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
        'R' => 
        array (
            'Rain' => 
            array (
                0 => __DIR__ . '/..' . '/rain/raintpl/library',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbaab981275154c3f4b2a761a04d348aa::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbaab981275154c3f4b2a761a04d348aa::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitbaab981275154c3f4b2a761a04d348aa::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitbaab981275154c3f4b2a761a04d348aa::$classMap;

        }, null, ClassLoader::class);
    }
}
