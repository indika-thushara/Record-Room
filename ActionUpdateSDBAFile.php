<?php
require_once 'db_connection.php';print_r($_POST);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ufnum = $_POST['ufnum'];
    $apidno =  $_POST['apidno'];
    $assmno =  $_POST['assmno'];
    $ward = $_POST['ward'];
    $stre = $_POST['stre'];
    $appron    = $_POST['appron'];
    $sql = '';
    if (!empty($_POST['fnum'])) {      

        $sql = "update sdba set  applicantIdNo = ?, assesmentNo= ?, ward = ? , street = ?, approvedOn = ? where fileNumber = ?";
        $saveStmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($saveStmt, 'ssssss', $apidno, $assmno, $ward, $stre, $appron, $ufnum);        
        if (mysqli_stmt_execute($saveStmt)) {
            header("Location:addUpdateFile.php?success=1");
        }
    } else {        
        $sql = "insert into sdba values (?,?,?,?,?,?)";
        $saveStmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($saveStmt, 'ssssss', $ufnum, $apidno, $assmno, $ward, $stre, $appron);
        if (mysqli_stmt_execute($saveStmt)) {
            header("Location:addUpdateFile.php?success=1");
        }
    }
}
