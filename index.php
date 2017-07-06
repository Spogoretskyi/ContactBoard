<?php

require_once './bootstrap.php';
$tableName = 'comments';
$db = new db;
$result = $db->selectTop(15, 'ASC');
$username = $_POST["username"];
$text = $_POST["text"];
$submit = $_POST['submit'];
$insertData = array ('username'=>$username, "text"=>$text);

include("header.php");

switch($_GET['page']) {
    case 'home':
        include('ToScreen.php');
        break;
    case 'addcomment':
        include("AddComment.php");

        if (isset($submit))
        {
            if(empty($username) || empty($text))
                echo "<div style=\"font:bold 18px Arial; color:red; text-align:center;\">Заполните пустое поле.</div>";
            else
             $res = $db->insert($tableName, $insertData);
        }
        break;
    default:
        include('ToScreen.php');
}

?>
