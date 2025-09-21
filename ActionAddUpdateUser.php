<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuname = $_POST['uname'];
    $nupwd = $_POST['pwd'];
    $nurole = $_POST['role'];
    $confpwd = $_POST['confpwd'];
    $sql = '';
    if ($_POST['mode']=='new') {
        if($nupwd != $confpwd)
             header("Location:AddNewUser.php?mode=new&error=1");

        // $ufnum = $_POST['ufnum'];
        // if ($fnum != $_POST['ufnum']) {
        //     $sql = "select * from files where fileNumber='" . $fnum . "'";
        //     $result = mysqli_query($conn, $sql);
        //     if ($result && mysqli_num_rows($result) > 0) {
        //         header("Location:AddUpdateFile.php?error=1");
        //     }
        // } else {
        //     $sql = "update files set  fileName = ?, fileNumber= ?, fileClosedOn = ? , ReceivedRROn = ?, getBackOfficeOn = ?, departmentName = ?, officerName= ?, ReceivedBackToRROn = ?, cellNo = ?, rackNo = ?, fileDistroiedOn = ?, Note= ?, fileTypeId= ? where fileNumber = ?";
        //     $saveStmt = mysqli_prepare($conn, $sql);
        //     mysqli_stmt_bind_param($saveStmt, 'ssssssssssssis', $fname, $fnum, $fclon, $frecreon, $bakoffice,  $dname, $offname, $bakrron, $cellNo, $rackno, $fdeson, $note, $ftype, $ufnum);
        //     if (mysqli_stmt_execute($saveStmt)) {
        //         header("Location:addUpdateFile.php?success=1");
        //     }
        // }
    } else {
        // $sql = "select * from files where fileNumber='" . $fnum . "'";
        // $result = mysqli_query($conn, $sql);
        // if ($result && mysqli_num_rows($result) > 0) {
        //     header("Location:AddUpdateFile.php?error=1");
        // }
        // $sql = "insert into files values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
        // $saveStmt = mysqli_prepare($conn, $sql);
        // mysqli_stmt_bind_param($saveStmt, 'ssssssssssssi', $fnum, $fname, $fclon, $frecreon, $bakoffice,  $dname, $offname, $bakrron, $cellNo, $rackno, $fdeson, $note, $ftype);
        // if (mysqli_stmt_execute($saveStmt)) {
        //     header("Location:addUpdateFile.php?success=1");
        // }
    }
}
