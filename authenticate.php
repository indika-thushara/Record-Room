<?php
session_start();
require_once 'db_connection.php';

$input_hash = hash('sha256', $_POST['pwd']);
$sql = "select * from users where userName='{$_POST['uname']}'";
$result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
$isLoginSuccess = FALSE;

while ($row = mysqli_fetch_assoc($result)) {
    if ($row['password'] == $input_hash) {
        $isLoginSuccess = TRUE;
        $_SESSION["user"] = $row["userName"];
        $_SESSION["role"] = $row["userRole"];
        break;
    }
}
mysqli_close($conn);

if ($isLoginSuccess) {
    header("Location:Dashboard.php");
} else {
    header("Location:login.php?error=1");
}
