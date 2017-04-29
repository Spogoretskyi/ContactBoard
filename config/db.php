<?php

class db
{
    protected $host;
    protected $user;
    protected $password;
    protected $connection;
    protected $database_name;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'homestead';
        $this->password = 'secret';
        $this->connect();
    }

    public function connect()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database_name);
    }

    public function query($query)
    {
        return mysqli_query($this->connection, $query);
    }


}