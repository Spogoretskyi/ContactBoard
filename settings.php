<?php

class Settings
{
    public static function getSettings()
    {
        $settings = array(
            'host' => getenv('DATABASE_HOST'),
            'name' => getenv('DATABASE_NAME'),
            'port' => '3306',
            'charset' => 'utf8',
            'username' => getenv('DATABASE_USERNAME'),
            'password' => getenv('DATABASE_PASSWORD')
        );
        return $settings;
    }
}
