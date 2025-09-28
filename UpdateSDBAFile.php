<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update SD/BA File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php
    include "header.php";
    require_once "db_connection.php";
    $ufnum = "";
    $sql = "";
    $result = "";


    
    $fileNumber = "";
    $applicantIdNo = "";
    $assesmentNo = "";
    $ward = "";
    $street = "";
    $approvedOn    = "";
    $disable = $_SESSION["role"] == 'Viewer'?'disabled':'';


    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) {
            echo "<div class='alert alert-danger' role='alert'>File Number Already Exist</div>";
        }

        if ($_GET['error'] == 2) {
            echo "<div class='alert alert-danger' role='alert'>Please Select the Course Type</div>";
        }
    }

    if (isset($_GET['ufno'])) {

        $ufnum =  $_GET['ufno'];
        $sql = "SELECT * From sdba WHERE fileNumber='" . $ufnum . "'";

        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die("Query faild..." . $conn->error);
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fnum = $row['fileNumber'];
                $applicantIdNo = $row['applicantIdNo'];
                $assesmentNo = $row['assesmentNo'];
                $ward = $row['ward'];
                $street = $row['street'];
                $approvedOn = $row['approvedOn'];
            }
        }
    }


    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="formHeader">
                    Update SD/BA File
                </div>
                <form class="p-4" action="ActionUpdateSDBAFile.php" method="post">
                    <div class="mt-3">
                        <label for="ufnum" class="form-label">File Number</label>
                        <input type="text" name="ufnum" id="ufnum" class="form-control" readonly value="<?php echo $ufnum  ?>">
                    </div>
                    <input type="hidden" name="fnum" value="<?php echo !empty($fnum) ? $fnum : ''; ?>">

                    <div class="mt-3">
                        <label for="apidno" class="form-label">Applicant Id No</label>
                        <input type="text" name="apidno" id="apidno" class="form-control" minlength="10" maxlength="12" value="<?php echo  $applicantIdNo  ?>">
                    </div>
                    <div class="mt-3">
                        <label for="assmno" class="form-label">Assessment No</label>
                        <input type="text" name="assmno" id="assmno" class="form-control" value="<?php echo  $assesmentNo  ?>">
                    </div>

                    <div class="mt-3">
                        <label for="ward" class="form-label">Ward</label>
                        <input type="text" name="ward" id="ward" class="form-control" value="<?php echo  $ward  ?>">
                    </div>
                    <div class="mt-3">
                        <label for="stre" class="form-label">Street</label>
                        <input type="text" name="stre" id="stre" class="form-control" value="<?php echo $street  ?>">
                    </div>
                    <div class="mt-3">
                        <label for="appron" class="form-label">Approved On</label>
                        <input type="date" name="appron" id="appron" class="form-control" value="<?php echo  $approvedOn ?>">
                    </div>
                    <div class="mt-3">
                        <div class="row g-3 mt-3">
                            <div class="col-sm-4 d-flex align-items-center text-nowrap gap-2">
                                <button type="submit" <?php echo $disable ?> class="btn btn-primary">Save</button>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center text-nowrap gap-2">
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('bakoffice').addEventListener('change', function() {
            document.getElementById('bakrron').value = '';
            document.getElementById('dname').value = '';
            document.getElementById('offname').value = '';
        });
    </script>
</body>

</html>