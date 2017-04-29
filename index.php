<?php
include('AddComment.php');

require_once './bootstrap.php';
$db = new db;
echo '<pre>';
$result = $db->select('select * from comments');

if ($_POST) {
    $username = $_POST["username"];
    $text = $_POST["text"];
    $res = $db->insert("INSERT INTO comments (username,text) VALUES ('$username','$text')");

    echo $res;
}

?>

    <table border="1">
        <th>User Name</th>
        <th>Text</th>
        <?php foreach ($result as $r) { ?>
            <tr>
                <td> <?php echo $r['username'] ?></td>
                <td> <?php echo $r['text'] ?> </td>
            </tr>
        <?php } ?>
    </table>

<?php

echo '</pre>';
?>