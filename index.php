<?php
error_reporting(E_ALL);
require_once './bootstrap.php';
echo 123;
$db = new db;
echo '<pre>';
$result = $db->query('select * from comments');

while ($row = $result->fetch_assoc()) {
    echo " id = " . $row['id'] . PHP_EOL;
    echo " name = " . $row['username'] . PHP_EOL;
    echo " text = " . $row['text'] . PHP_EOL;
}
echo '</pre>';
?>