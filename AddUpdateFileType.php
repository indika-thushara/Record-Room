<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add/Update File Type</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    include "header.php";
    require_once "db_connection.php";
    $uftid = "";
    $sql = "";
    $result = "";

    $fileTypeId = "";
    $fileType = "";
    $fileTypeDes = "";


    if ($_SESSION['role'] != 'Admin')
        header("Location:ManageFileTypes.php?error=1");

    if (isset($_GET['uftid'])) {
        $uftid = $_GET['uftid'];
        $sql = "SELECT * FROM file_type WHERE fileTypeId='" . $uftid . "'";
        $result = mysqli_query($conn, $sql);
        if ($result === false)
            die("Query faild..." . $conn->error);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileTypeId = $row['fileTypeId'];
                $fileType = $row['fileType'];
                $fileTypeDes = $row['fileTypeDes'];
            }
        }
    }


    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php
                if (isset($_GET['error']))
                    if ($_GET['error'] == 1)
                        echo "<div class='alert alert-danger' role='alert'>File Type Already Exist</div>";

                if (isset($_GET['success']))
                    if ($_GET['success'] == 1)
                        echo "<div class='alert alert-primary' role='alert'>Record Saved Successfully</div>";

                if ($_SESSION['role'] == 'Viewer')
                    header("Location:ManageFileTypes.php?error=1");
                ?>

                <div class="formHeader">
                    Add/Update File Type
                </div>
                <form action="ActionFileTypes.php" method="post" class="p-4">
                    <div class="mt-3">
                        <label class="form-label" for="ftype">File Type</label>
                        <input class="form-control" type="text" name="ftype" id="ftype" value="<?php echo $fileType; ?>" minlength="2" maxlength="50" required>
                        <input type="hidden" name="uftid" value="<?php echo $fileTypeId; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="ftdes" class="form-label">Description</label>
                        <input class="form-control" type="text" name="ftdes" value="<?php echo $fileTypeDes; ?>" id="ftdes" maxlength="200">
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