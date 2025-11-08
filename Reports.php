<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
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

    $fileName = "";
    $fileNumber = "";
    $fileClosedOn = "";
    $ReceivedRROn = "";
    $getBackOfficeOn = "";
    $departmentName = "";
    $officerName    = "";
    $ReceivedBackToRROn = "";
    $cellNo = "";
    $rackNo = "";
    $fileDistroiedOn = "";
    $Note = "";
    $fileTypeId = "";
    $disable = $_SESSION["role"] == 'Viewer' ? 'disabled' : '';

    if (isset($_GET['ufno'])) {
        $ufnum = $_GET['ufno'];

        $sql = "SELECT * From files WHERE fileNumber='" . $ufnum . "'";

        $result = mysqli_query($conn, $sql);

        if ($result === false) {
            die("Query faild..." . $conn->error);
        }
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileName = $row['fileName'];
                $fileNumber = $row['fileNumber'];
                $fileClosedOn = $row['fileClosedOn'];
                $ReceivedRROn = $row['ReceivedRROn'];
                $getBackOfficeOn = $row['getBackOfficeOn'];
                $departmentName = $row['departmentName'];
                $officerName    = $row['officerName'];
                $ReceivedBackToRROn = $row['ReceivedBackToRROn'];
                $cellNo = $row['cellNo'];
                $rackNo = $row['rackNo'];
                $fileDistroiedOn = $row['fileDistroiedOn'];
                $Note = $row['Note'];
                $fileTypeId = $row['fileTypeId'];
            }
        }
    }


    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">




                <div class="mt-3">
                    <label for="fnum" class="form-label">File are get back to the offiece</label>
                    <a link type="button" href="FilesGetBackOffice.php" class="btn btn-secondary float-end">Get report</a>
                </div>
                <hr>
                <!-- <input type="text" name="fnum" id="fnum" class="form-control" maxlength="100" required value="<?php echo !empty($fileNumber) ? $fileNumber : ''; ?>"> -->
                <div class="mt-3 text-center">
                    <div class="d-flex justify-content-center gap-3">
                        <button type="submit" <?php echo $disable ?> class="btn btn-primary">Save</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
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