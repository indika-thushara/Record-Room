<?php

require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $ftype = $_POST['ftype'];
    $ftdes = $_POST['ftdes'];
    $sql = "";

    if (!empty($_POST['uftid'])) {
        $uftid = $_POST['uftid'];
        $sql = "SELECT * FROM file_type WHERE fileType='" . $_POST['ftype'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc())
                $ftid = $row['fileTypeId'];
            if ($ftid != $uftid)
                header("Location:AddUpdateFileType.php?error=1");
            else {
                $sql = "update file_type set  fileType = ?, fileTypeDes = ? where fileTypeId = ?";
                $saveStmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($saveStmt, 'ssi', $ftype, $ftdes, $uftid);
                if (mysqli_stmt_execute($saveStmt))
                    header("Location:AddUpdateFileType.php?success=1");
            }
        } else {
            $sql = "update file_type set  fileType = ?, fileTypeDes = ? where fileTypeId = ?";
            $saveStmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($saveStmt, 'ssi', $ftype, $ftdes, $uftid);
            if (mysqli_stmt_execute($saveStmt))
                header("Location:AddUpdateFileType.php?success=1");
        }
    } else {
        $sql = "SELECT * FROM file_type WHERE fileType='" . $_POST['ftype'] . "'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0)
            header("Location:AddUpdateFileType.php?error=1");
        $sql = "insert into file_type (fileType,fileTypeDes) values (?,?)";
        $saveStmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($saveStmt, 'ss', $ftype, $ftdes);
        if (mysqli_stmt_execute($saveStmt))
            header("Location:AddUpdateFileType.php?success=1");
    }
}
