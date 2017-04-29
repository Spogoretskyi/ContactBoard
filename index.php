<?php

include ('AddComment.php');

require_once './bootstrap.php';
$db = new db;
echo '<pre>';
$result = $db->select('select * from comments');




echo '</pre>';
?>