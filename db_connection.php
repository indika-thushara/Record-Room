<?php

$conn = mysqli_connect("localhost", "root", "", "record_room_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>