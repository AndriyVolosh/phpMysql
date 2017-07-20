<?php

//ini_set('display_errors', false);

const DB_USER = 'root';
const DB_PASS = '';
const DB_NAME = 'ato_php_test';
const DB_HOST = 'localhost';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!$db) {
    echo 'problem with connect on BD' . ' ' . mysqli_connect_errno() . ' ' . mysqli_connect_error();
} else {
    //echo 'well connect on BD';
    $query = 'SELECT * FROM students';
    $result = mysqli_query($db, $query);
    if (!$result) {
        echo 'not result' . ' ' . mysqli_errno($db) . ' ' . mysqli_error($db);
    } else {
        $res .= '<tr>';
        $res .= '<th>id</th>';
        $res .= '<th>name</th>';
        $res .= '<th>email</th>';
        $res .= '<th>action</th>';
        $res .= '</tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            $res .= '<tr>';
            $res .= '<td>' . $row ['id'] . '</td>';
            $res .= '<td>' . $row ['name'] . '</td>';
            $res .= '<td>' . $row ['email'] . '</td>';
            $res .= '<td><a href="delete_user.php?id='.$row ['id'].'">X</a></td>';
            $res .= '</tr>';
        }
    }
    mysqli_close($db);
    //echo $res;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Show users</title>
    </head>
    <body>
        <div>
        <table border="1px">
            <?=$res ?>
        </table>
        </div>
        <div>
            <a href="add_user.php">Добавить пользователя</a>
        </div>
        
    </body>
</html>
