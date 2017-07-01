<?php

class Settings
{
    public function settings()
    {
        $settings = array(
            'host' => '127.0.0.1',
            'name' => 'contactboard',
            'port' => '3306',
            'charset' => 'utf8',
            'username' => 'root',
            'password' => 'root'
        );
        return $settings;
    }
}
