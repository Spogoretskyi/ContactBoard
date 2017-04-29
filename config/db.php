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
        $this->host = '127.0.0.1';
        $this->user = 'root';
        $this->password = 'root';
        $this->database_name = 'contactboard';
        $this->connect();
    }

    public function __destruct()
    {
        mysqli_close($this->connection);
    }

    public function connect()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->database_name);
    }

    public function select($query)
    {

        $result = array();
        $dbresult = mysqli_query($this->connection, $query);
        while($row = $dbresult->fetch_row())
        {
            $result[] = $row;
        }

        $dbresult->free();


        return $result;
    }
    public function query($query)
    {
        return mysqli_query($this->connection, $query);
    }

}