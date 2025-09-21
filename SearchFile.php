<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="formHeader">
                    <h4>Search File</h4>
                </div>
                <form action="" class="p-4" method="post">
                    <div class="mt-3">
                        <label for="fname" class="form-label">File Name</label>
                        <input type="text" name="fname" id="fname" class="form-control maxtext-width" placeholder="Enter file name to search">
                    </div>
                    <div class="mt-3">
                        <label for="fnum" class="form-label">File Number</label>
                        <input type="text" name="fnum" id="fnum" class="form-control" placeholder="Enter file number to search">
                    </div>

                    <div class="mt-3">
                        <div class="row g-3 mt-3 ">
                            <div class="col-sm-6 d-flex justify-content-center gap-2">
                                <button type="submit" name="Submit" id="Submit" class="btn btn-primary" onclick="validate();">Search</button>
                            </div>
                            <div class="col-sm-6  d-flex justify-content-center gap-2">
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>

                </form>

                <?php


                ?>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col">File Number</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            //Get the database connection.
                            include 'db_connection.php';
                            //Check if the request method is post.
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                //Check the sbumit button is clicked.                             
                                if (isset($_POST['Submit'])) {
                                    $sql = '';
                                    $sFname = '';
                                    $sFnum = '';
                                    $result = '';
                                    if (!empty($_POST['fname'])) {
                                        $sFname =  trim($_POST['fname']);
                                        $sql = "SELECT f.fileNumber, f.fileName, ft.fileType FROM files f
                                        INNER JOIN file_Type ft ON f.fileTypeId = ft.fileTypeId                                        
                                        WHERE fileName LIKE '%" . $sFname . "%'";
                                    }
                                    if (!empty($_POST['fnum'])) {
                                        $sFnum =  trim($_POST['fnum']);
                                        $sql = "SELECT f.fileNumber, f.fileName, ft.fileType FROM files f
                                        INNER JOIN file_Type ft ON f.fileTypeId = ft.fileTypeId    
                                        WHERE fileNumber LIKE '%" . $sFnum . "%'";
                                    }
                                    if (!empty($sql)) {
                                        $result = mysqli_query($conn, $sql);
                                        if ($result === false)
                                            die("Query faild..." . $conn->error);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr><td>" . $row['fileName'] . "</td><td>" . $row['fileNumber'] . "</td><td>" . $row['fileType'] . "</td><td><a href='AddUpdateFile.php?ufno=" . $row['fileNumber'] . "'>Udate</a></td>";
                                                if ($row['fileType'] == 'Subdivision' || $row['fileType'] == 'Building Application')
                                                    echo "<td><a href=UpdateSDBAFile.php?ufno=" . $row['fileNumber'] . ">Add more data</a></td></tr>";
                                                else
                                                    echo "<td></td></tr>";
                                            }
                                        }
                                    }
                                }
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
        document.getElementById('fname').addEventListener('change', function() {
            document.getElementById('fnum').value = '';
        });
        document.getElementById('fnum').addEventListener('change', function() {
            document.getElementById('fname').value = '';
        });

        function validate() {
            if (document.getElementById('fnum').value == '' && document.getElementById('fname').value == '')
                alert("Please enter File Name or File Number.");
        }
    </script>
</body>

</html>