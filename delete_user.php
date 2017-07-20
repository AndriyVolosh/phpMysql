<?php
const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'ato_php_test';
const DB_HOST = 'localhost';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db) {
    echo 'problem with connect on BD' . ' ' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
} else {
    if ($_GET) {
        $id = filter_input(INPUT_GET, 'id');
        $query = "DELETE FROM students WHERE `id`='$id'";
        $result = mysqli_query($db, $query);
        if (!$result) {
            echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
        } else {
            echo 'user deleted';
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <a href="show_users.php">Список пользователей</a>
    </body>
</html>