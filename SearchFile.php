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
                <form class="p-4">
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
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                            <div class="col-sm-6  d-flex justify-content-center gap-2">
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                        </div>
                    </div>

                </form>

                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">File Name</th>
                                <th scope="col">File Number</th>
                                <th scope="col">Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Mark</td>
                                <td>1</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <td>Jacob</td>
                                <td>2</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>3</td>
                                <td>Doe</td>
                                <td>@social</td>
                            </tr>
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