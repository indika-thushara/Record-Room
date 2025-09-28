<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage File Types</title>
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
                        echo "<div class='alert alert-danger' role='alert'>You have no permissions to change file types.</div>";
                    }
                }
                ?>
                <h1 class="title">Manage File Types</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="btn btn-primary" href="addupdatefiletype.php" role="button">Add New File Type</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">File Type</th>
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("db_connection.php");

                            $result = mysqli_query($conn, "SELECT * FROM file_type");

                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>                                 
                                <td>" . $row['fileType'] . "</td>
                                <td>" . $row['fileTypeDes'] . "</td>
                                <td><a href='AddUpdateFileType.php?uftid=" . $row['fileTypeId'] . "'>Update</a></td>
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
    <script>
        document.getElementById('recback').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('bakrron').value = '';
            }
        });
    </script>
</body>

</html>