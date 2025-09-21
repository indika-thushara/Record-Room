<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo "<div class='alert alert-danger' role='alert'>Password confirmation is failed.</div>";
                    }
                }

                if ($_GET['mode'] == 'new')
                    if ($_SESSION['role'] != 'Admin')
                        header("Location:ManageUsers.php?error=1");

                ?>
                <div class="formHeader">
                    Add New User
                </div>
                <form action="ActionAddUpdateUser.php" method="post" class="p-4">
                    <div class="mt-3">
                        <label class="form-label" for="uname">User Name</label>
                        <input class="form-control" type="text" name="uname" id="uname" minlength="4" maxlength="100" autocomplete="off" required>
                        <input class="form-control" type="hidden" name="mode" value="<?php echo $_GET['mode']; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="role" class="form-label">User Role</label>
                        <select class="form-select" name="role" id="role">
                            <option value="1">Admin</option>
                            <option value="2">Editor</option>
                            <option value="3" selected>Viewer</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input class="form-control" type="password" name="pwd" id="pwd" autocomplete="new-password" required>
                    </div>
                    <div class="mt-3">
                        <label for="confpwd" class="form-label">Confirm password</label>
                        <input class="form-control" type="password" name="confpwd" id="confpwd" autocomplete="new-password" required>
                    </div>
                    <div class="mt-3 text-center">
                        <button type="submit" class="btn btn-primary me-4">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>


                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>