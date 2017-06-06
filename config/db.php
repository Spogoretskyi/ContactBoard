<?php

class db
{
    protected function connect()
    {
        $opt = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,];
        $pdo = new PDO ('mysql:host=127.0.0.1;dbname=contactboard','root','root', $opt);
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
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
            return $result;
        }
        catch (PDOException $err){
            echo "Data select error".$err->getMessage();
            exit;
        }
    }

    public function count()
    {
        try {
            $pdo = $this->connect();
            $stmt = $pdo->prepare("SELECT text FROM comments");
            $stmt->execute();
            $rows = $stmt->rowCount();
            return $rows;
        }
        catch (PDOException $err) {
            echo "Data count error".$err->getMessage();
            exit;
        }
    }

    public function insert($values)
    {
        try{
        $pdo = $this->connect();
        if (isset($values[0]) && isset ($values[1])) {
            $sql = "INSERT INTO comments (username, text)
                        VALUES (?,?)" ;
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(
                $values[0],
                $values[1]));
        }
    }
    catch (PDOException $err){
            echo "Data insert error".$err->getMessage();
            exit;
    }
        echo "<div style=\"font:bold 18px Arial; color:greenyellow; text-align:center;\">Ваш комментарий добавлен.</div>";
    }
}