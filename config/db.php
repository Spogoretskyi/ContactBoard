<?php

class db
{
    protected $host;
    protected $user;
    protected $password;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'homestead';
        $this->password = 'secret';
    }


}