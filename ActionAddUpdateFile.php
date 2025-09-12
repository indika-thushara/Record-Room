<?php
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['fname'];
    $fnum = $_POST['fnum'];
    $fclon = isset($_POST['fclon']) ? $_POST['fclon'] : '';
    $frecreon = isset($_POST['frecreon']) ? $_POST['frecreon'] : '';
    $bakoffice = $_POST['bakoffice'];
    $dname = $_POST['dname'];
    $offname    = $_POST['offname'];
    $bakrron = $_POST['bakrron'];
    $cellNo = $_POST['cellNo'];
    $rackno = $_POST['rackno'];
    $fdeson = $_POST['fdeson'];
    $note = $_POST['note'];
    $ftype = $_POST['ftype'];
    $sql = '';
    if (!empty($_POST['ufnum'])) {
        //Update file
        $ufnum = $_POST['ufnum'];

        if ($fnum != $_POST['ufnum']) {
            $sql = "select * from files where fileNumber='" . $fnum . "'";

            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                header("Location:AddUpdateFile.php?error=1");
            }
        } else {
            //Update function.
            //$sql = "update files set  fileName = '" . $fname . "', fileNumber= '" . $fnum . "', fileClosedOn = '" . $fclon . "' , ReceivedRROn = " . (!empty($frecreon)? "'". $frecreon ."'" : "NULL") ." where fileNumber =  '" . $ufnum . "'";
            $sql = "update files set  fileName = ?, fileNumber= ?, fileClosedOn = ? , ReceivedRROn = ?, getBackOfficeOn = ?, departmentName = ?, officerName= ?, ReceivedBackToRROn = ?, cellNo = ?, rackNo = ?, fileDistroiedOn = ?, Note= ?, fileTypeId= ? where fileNumber = ?";
            echo $sql;
            $saveStmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($saveStmt, 'ssssssssssssis', $fname, $fnum, $fclon, $frecreon, $bakoffice,  $dname, $offname, $bakrron, $cellNo, $rackno, $fdeson, $note, $ftype, $ufnum);
            if (mysqli_stmt_execute($saveStmt)) {
                echo "<br> - Saved";
            }
        }
    } else {
               

        $sql = "select * from files where fileNumber='" . $fnum . "'";

        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            header("Location:AddUpdateFile.php?error=1");
        }


        echo "Add new record.";

    }
}
