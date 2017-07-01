<?php

require_once 'MyException.php';
include 'C:\OpenServer\domains\ContactBoard\settings.php';

class db
{
    protected function connect()
    {
        $set = new Settings();
        $settings = $set->settings();
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,];
        $pdo = new PDO (sprintf(
            'mysql:host=%s;dbname=%s;port=%s;charset=%s',
            $settings['host'],
            $settings['name'],
            $settings['port'],
            $settings['charset']
            ),
            $settings['username'],
            $settings['password'], $opt
            );
        return $pdo;
    }

    public function selectTop($top, $sort)
    {
        try {
            $pdo = $this->connect();
            $result = array();
            if($sort === 'DESC')
                $stmt = $pdo->prepare("SELECT * FROM comments ORDER BY username DESC LIMIT :top");
            else
                $stmt = $pdo->prepare("SELECT * FROM comments ORDER BY username ASC LIMIT :top");
            $stmt->bindValue(':top', $top, PDO::PARAM_INT);
            if(!$stmt->execute())
                throw new MyException();
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        }
        catch (MyException $err){
            echo "Error: ".$err->getError();
            exit;
        }
    }

    public function count($tableName)
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare("SELECT count(*) FROM $tableName");
            if(!$stmt->execute())
                throw new MyException();
            $stmt->execute();
            $count = $stmt->fetch(PDO::FETCH_NUM);

            return reset($count);
        }
        catch (MyException $err){
            echo "Error: ".$err->getError();
            exit;
        }
    }

    public function insert($table, $array)
    {
        try{
            $pdo = $this->connect();
            $fields = array_keys($array);
            $values = array_values($array);
            $list = implode(',', $fields);
            $qs = str_repeat("?,",count($fields)-1);
            $sql = "INSERT INTO $table ($list) VALUES ({$qs}?)";
            $stmt = $pdo->prepare($sql);
            if(!$stmt->execute())
                throw new MyException();
            return $stmt ->execute($values);
    }
        catch (MyException $err){
            echo "Error: ".$err->getError();
            exit;
    }
        echo "<div style=\"font:bold 18px Arial; color:greenyellow; text-align:center;\">Ваш комментарий добавлен.</div>";
    }
}