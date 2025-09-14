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
    <?php include "header.php" ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="formHeader">
                    Add/Update File Type
                </div>
                <form action="" class="p-4">
                    <div class="mt-3">
                        <label class="form-label" for="ftype">File Type</label>
                        <input class="form-control" type="text" name="ftype" id="ftype" minlength="2" maxlength="50" required>
                    </div>                    
                    <div class="mt-3">
                        <label for="ftdes" class="form-label">Description</label>
                        <input class="form-control" type="text" name="ftdes" id="ftdes">
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