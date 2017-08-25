<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once './bootstrap.php';
$tableName = 'comments';
$db = new db;
$result = $db->selectTop(15, 'DATE');
if ($_POST) {
    $username = $_POST["username"];
    $text = $_POST["text"];
    $submit = $_POST['submit'];
    $date = date('F j, Y, g:i a');
    $insertData = ['username' => $username, "text" => $text, "Add_date" => $date];

}

include("header.php");
if (!isset($_GET['page'])) {
    $_GET['page'] = 'home';
}
switch ($_GET['page']) {
    case 'home':
        include('ToScreen.php');
        break;
    case 'addcomment':
        include("AddComment.php");
        if (isset($submit)) {
            if (empty($username) || empty($text)) {
                echo "<div style=\"font:bold 18px Arial; color:red; text-align:center;\">Заполните пустое поле.</div>";
            } else {
                $res = $db->insert($tableName, $insertData);
            }
        }
        break;
    default:
        include('ToScreen.php');


}
?>
