<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php   

    include "header.php";

    $disable = $_SESSION["role"] == 'Viewer'?'disabled':'';

    ?>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="title">Dashboard</h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="img/add.png" class="card-img-top d-block mx-auto mt-3" alt="..." style="width: 50%;">
                    <div class="card-body">
                        <a href="AddUpdateFile.php" class="btn btn-primary <?php echo $disable ?>">Add New FIle</a>
                        <p>Add a new file into the system</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="img/search.png" class="card-img-top d-block mx-auto mt-3" alt="..." style="width: 50%;">
                    <div class="card-body">
                        <a href="SearchFile.php" class="btn btn-primary">Search FIle</a>
                        <p>Search files in the system</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="img/manage.png" class="card-img-top d-block mx-auto mt-3" alt="..." style="width: 50%;">
                    <div class="card-body">
                        <a href="ManageFileTypes.php" class="btn btn-primary">Manage File Types</a>
                        <p>Manage file types in the system</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <?php
                            include "db_connection.php";
                            $sql = "call filescount()";
                            $result = mysqli_query($conn, $sql);
                            if ($result)
                                $row = mysqli_fetch_assoc($result);
                            mysqli_close($conn);
                            ?>
                            <?php echo "<h3>" . $row['filescount'] . "</h3>" ?>
                            <p class="h5">Files are in the system.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <?php
                            include "db_connection.php";
                            $sql = "Call filesGetBackOff()";
                            $result = mysqli_query($conn, $sql);
                            if ($result)
                                $c = mysqli_num_rows($result);
                            mysqli_close($conn);
                            ?>
                            <?php echo "<h3>" . $c . "</h3>" ?>
                            <p class="h5">Files are get back to the office.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <?php
                            include "db_connection.php";
                            $sql = "Call filestobedistroid()";
                            $result = mysqli_query($conn, $sql);
                            if ($result)
                                $c = mysqli_num_rows($result);
                            mysqli_close($conn);
                            ?>
                            <?php echo "<h3>" . $c . "</h3>" ?>
                            <p class="h5">Files to be distroied.</p>
                        </div>
                    </div>
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