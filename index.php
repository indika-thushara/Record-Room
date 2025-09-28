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
                        <a href="AddUpdateFile.php" class="btn btn-primary">Add New FIle</a>
                        <p>Add a new file into the system</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="img/search.png" class="card-img-top d-block mx-auto mt-3" alt="..." style="width: 50%;">
                    <div class="card-body">
                        <a href="SearchFile.php" class="btn btn-primary">Search FIle</a>
                        <p>Search the files in system</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center">
                <div class="card">
                    <img src="img/manage.png" class="card-img-top d-block mx-auto mt-3" alt="..." style="width: 50%;">
                    <div class="card-body">
                        <a href="AddUpdateFileType.php" class="btn btn-primary">Manage File Types</a>
                        <p>Manage the filetypes in system</p>
                    </div>
                </div>
            </div>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Number of files in system.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Files are get back to the office.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Number of files to be distroied.</p>
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