<?php
session_start();
require_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nuname = $_POST['uname'];
    $nupwd = $_POST['pwd'];
    $nurole = $_POST['role'];
    $confpwd = $_POST['confpwd'];
    $sql = '';


    if ($_POST['mode'] == 'u') {
        $uid = $_POST['uid'];
        $sql = "select * from users where userName='" . $nuname . "'";
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = $result->fetch_assoc())
                if ($row['userId'] != $uid)
                    header("Location:AddNewUser.php?mode=u&error=2");
                else {
                    if (!empty($nupwd)) {
                        if ($nupwd != $confpwd)
                            header("Location:AddNewUser.php?mode=u&error=1");
                        else {
                            $input_hash = hash('sha256', $nupwd);
                            $sql = "update users set  userName = ?, userRole= ?, password=? where userId = ?";
                            $saveStmt = mysqli_prepare($conn, $sql);
                            mysqli_stmt_bind_param($saveStmt, 'sssi', $nuname, $nurole, $input_hash, $uid);
                            if (mysqli_stmt_execute($saveStmt)) {
                                header("Location:AddNewUser.php?success=1");
                            }
                        }
                    } else {
                        $sql = "update users set  userName = ?, userRole= ? where userId = ?";
                        $saveStmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($saveStmt, 'ssi', $nuname, $nurole, $uid);
                        if (mysqli_stmt_execute($saveStmt)) {
                            header("Location:AddNewUser.php?success=1");
                        }
                    }
                }
        } else {
            if (!empty($nupwd)) {
                if ($nupwd != $confpwd)
                    header("Location:AddNewUser.php?mode=u&error=1");
                $input_hash = hash('sha256', $nupwd);
                $sql = "update users set  userName = ?, userRole= ?, password=? where userId = ?";
                $saveStmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($saveStmt, 'sssi', $nuname, $nurole, $input_hash, $uid);
                if (mysqli_stmt_execute($saveStmt)) {
                    header("Location:AddNewUser.php?success=1");
                }
            } else {
                $sql = "update users set  userName = ?, userRole= ? where userId = ?";
                $saveStmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($saveStmt, 'ssi', $nuname, $nurole, $uid);
                if (mysqli_stmt_execute($saveStmt)) {
                    header("Location:AddNewUser.php?success=1");
                }
            }
        }
    } elseif ($_POST['mode'] == 'd') {
        if ($_SESSION["user"] == $nuname)
            header("Location:ManageUsers.php?&error=2");
        else {
            if (isset($_POST['delete'])) {
                $sql = "delete from users where userName=?";
                $saveStmt = mysqli_prepare($conn, $sql);
                mysqli_stmt_bind_param($saveStmt, 's', $nuname);
                if (mysqli_stmt_execute($saveStmt)) {
                    header("Location:ManageUsers.php?success=1");
                }
            };
        }
    } else {
        if ($nupwd != $confpwd)
            header("Location:AddNewUser.php?mode=n&error=1");
        else {
            $sql = "select * from users where userName='" . $nuname . "'";
            $result = mysqli_query($conn, $sql);
            if ($result && mysqli_num_rows($result) > 0) {
                header("Location:AddNewUser.php?mode=n&error=2");
            }
            $input_hash = hash('sha256', $nupwd);
            $sql = "insert into users (userName, userRole, password) values (?,?,?)";
            $saveStmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($saveStmt, 'sss', $nuname, $nurole, $input_hash);
            if (mysqli_stmt_execute($saveStmt)) {
                header("Location:AddNewUser.php?success=1");
            }
        }
    }
}
