<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        echo "<div class='alert alert-danger' role='alert'>You have no permissions to change users.</div>";
                    }
                    if ($_GET['error'] == 2) {
                        echo "<div class='alert alert-danger' role='alert'>Cannot delete this user.</div>";
                    }
                    if ($_GET['error'] == 3) {
                        echo "<div class='alert alert-danger' role='alert'>Invalid Action.</div>";
                    }
                }
                if (isset($_GET['success'])) {
                    if ($_GET['success'] == 1) {
                        echo "<div class='alert alert-primary' role='alert'>User deleted successfully.</div>";
                    }
                }
                ?>
                <h1 class="title">Manage Users</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="addnewuser.php?mode=n" role="button">Add New User</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">User Role</th>
                                <th scope="col">Update</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("db_connection.php");

                            $result = mysqli_query($conn, "SELECT * FROM users");

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                <td>" . $row['userName'] . "</td>
                                <td>" . $row['userRole'] . "</td>
                                <td><a href='AddNewUser.php?mode=u&uname=" . $row['userName'] . "'>Update</a></td>
                                <td><a href='AddNewUser.php?mode=d&uname=" . $row['userName'] . "'>Delete</a></td>
                                </tr>";
                            }
                            mysqli_close($conn);
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>

</html>