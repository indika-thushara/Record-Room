
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "header.php";
    require_once "db_connection.php";
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                $uname = "";
                $uid = "";
                $urole = "";
                $upss = "";
                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo "<div class='alert alert-danger' role='alert'>Password confirmation is failed.</div>";
                    }
                    if ($_GET['error'] == 2) {
                        echo "<div class='alert alert-danger' role='alert'>Username allready exist.</div>";
                    }
                }
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 1) {
                        echo "<div class='alert alert-primary' role='alert'>Record Saved Successfully</div>";
                    }
                }
                if ($_SESSION['role'] != 'Admin')
                    header("Location:ManageUsers.php?error=1");
                if (isset($_GET['mode']) && isset($_GET['uname'])) {
                    if ($_GET['mode'] == 'u' || $_GET['mode'] == 'd') {
                        $sql = "select * from users where userName='" . $_GET['uname'] . "'";
                        $result = mysqli_query($conn, $sql);
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $uname = $row['userName'];
                                $uid = $row['userId'];
                                $urole = $row['userRole'];
                            }
                        }
                    }
                }
                ?>
                <div class="formHeader">
                    Add/Update User
                </div>
                <form action="ActionAddUpdateUser.php" method="post" class="p-4">
                    <div class="mt-3">
                        <label class="form-label" for="uname">User Name</label>
                        <input class="form-control" type="text" name="uname" id="uname" minlength="4" maxlength="100" autocomplete="off" value="<?php echo $uname ?>" required>
                        <input class="form-control" type="hidden" name="mode" value="<?php echo isset($_GET['mode']) ? $_GET['mode'] : null; ?>">
                        <input class="form-control" type="hidden" name="uid" value="<?php echo $uid ?>">
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">User Role</label>
                        <select class="form-select" name="role" id="role">
                            <option value=3 <?php echo ($urole == 'Viewer') ? 'selected' : '' ?>>Viewer</option>
                            <option value=2 <?php echo ($urole == 'Editor') ? 'selected' : '' ?>>Editor</option>
                            <option value=1 <?php echo ($urole == 'Admin') ? 'selected' : '' ?>>Admin</option>

                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input class="form-control" type="password" name="pwd" id="pwd" autocomplete="new-password">
                    </div>
                    <div class="mt-3">
                        <label for="confpwd" class="form-label">Confirm password</label>
                        <input class="form-control" type="password" name="confpwd" id="confpwd" autocomplete="new-password">
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" name="submit" class="btn btn-primary me-4">Save</button>                        
                        <button type="reset" name="reset" class="btn btn-secondary me-4">Reset</button>
                        <button type="submit" <?php echo $_GET['mode'] == 'd' ? "" : "hidden"; ?> name="delete" class="btn btn-danger me-4">Delete</button>                        
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>