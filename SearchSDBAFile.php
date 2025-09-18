<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search SD/BA File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="formHeader">
                    <h4>Search SD/BA File</h4>
                </div>
                <form action="" class="p-4" method="post">
                    <div class="mt-3">
                        <label for="idno" class="form-label">Applicant ID No</label>
                        <input type="text" name="idno" id="idno" class="form-control maxtext-width" placeholder="Enter ID number to search">
                    </div>
                    <div class="mt-3">
                        <label for="assno" class="form-label">Assesment Number</label>
                        <input type="text" name="assno" id="assno" class="form-control" placeholder="Enter Assesment number to search">
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
                                <th scope="col">ID Number</th>
                                <th scope="col">Assesment Number</th>
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
                                    $sidno = '';
                                    $sassnum = '';
                                    $result = '';
                                    if (!empty($_POST['idno'])) {
                                        $sidno =  trim($_POST['idno']);
                                        $sql = "SELECT sb.fileNumber, f.fileName, sb.applicantIdNo, sb.assesmentNo FROM files f
                                        INNER JOIN sdba sb ON f.fileNumber = sb.fileNumber                                        
                                        WHERE applicantIdNo LIKE '%" . $sidno . "%'";
                                    }
                                    if (!empty($_POST['assno'])) {
                                        $sassnum =  trim($_POST['assno']);
                                         $sql = "SELECT sb.fileNumber, f.fileName, sb.applicantIdNo, sb.assesmentNo FROM files f
                                        INNER JOIN sdba sb ON f.fileNumber = sb.fileNumber   
                                        WHERE assesmentNo LIKE '%" . $sassnum . "%'";
                                    }

                                    $result = mysqli_query($conn, $sql);

                                    if ($result === false) {
                                        die("Query faild..." . $conn->error);
                                    }
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo "<tr><td>" . $row['fileName'] . "</td><td>" . $row['fileNumber'] . "</td><td>" . $row['applicantIdNo'] . "</td><td>" . $row['assesmentNo'] . "</td><td><a href='AddUpdateFile.php?ufno=" . $row['fileNumber'] . "'>Udate</a></td>";
                                            echo "<td><a href=UpdateSDBAFile.php?ufno=" . $row['fileNumber'] . ">Update more data</a></td></tr>";
                                            echo "<td></td></tr>";                                            
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
        document.getElementById('idno').addEventListener('change', function() {
            document.getElementById('assno').value = '';
        });
        document.getElementById('assno').addEventListener('change', function() {
            document.getElementById('idno').value = '';
        });
        function validate() {
            if (document.getElementById('assno').value == '' && document.getElementById('idno').value == '')
                alert("Please enter ID Number or Assesment Number.");
        }
    </script>
</body>

</html>