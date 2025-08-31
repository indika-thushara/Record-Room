<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Update File</title>
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
                    Add/Update File
                </div>
                <form class="p-4">
                    <div class="mt-3">
                        <label for="fnum" class="form-label">File Number</label>
                        <input type="text" name="fnum" id="fnum" class="form-control" maxlength="100" required>
                    </div>
                    <div class="mt-3">
                        <label for="fname" class="form-label">File Name</label>
                        <input type="text" name="fname" id="fname" class="form-control" maxlength="100" required>
                    </div>
                    <div class="mt-3">
                        <label for="ftype" class="form-label">File Type</label>
                        <select class="form-select" name="ftype" aria-label="Default select example">
                            <option value="1">General</option>
                            <option value="2">SD</option>
                            <option value="3">BA</option>
                            <option value="3">Personal File</option>
                            <option value="3">Salary Ledger</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="fclon" class="form-label">File Closed On</label>
                        <input type="date" name="fclon" id="fclon" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="frecreon" class="form-label">Received to Record Room On</label>
                        <input type="date" name="frecreon" id="frecreon" class="form-control">
                    </div>
                    <div class="row g-3 mt-3">
                        <div class="col-sm-6 d-flex align-items-center text-nowrap gap-2">
                            <label class="form-label">Rack No</label> <input type="text" maxlength="3" name="rackno"
                                class="form-control">
                        </div>
                        <div class="col-sm-6 d-flex align-items-center text-nowrap gap-2">
                            <label class="form-label">Cell No</label><input type="text" maxlength="3" name="cellNo"
                                class="form-control">
                        </div>                        
                    </div>
                    <hr>
                    <div class="mt-3">
                        <label for="bakoffice" class="form-label">File is Get Back to Office On</label>
                        <input type="date" name="bakoffice" id="bakoffice" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="dname" class="form-label">Department Name</label>
                        <input type="text" name="dname" id="dname" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="offname" class="form-label">Officer Name</label>
                        <input type="text" name="offname" id="offname" class="form-control">
                    </div>
                   
                    <div class="mt-3">
                        <label for="bakrron" class="form-label">File Received Back to Record Room On</label>
                        <input type="date" name="bakrron" id="bakrron" class="form-control">
                    </div>
                    <hr>                    
                    <div class="mt-3">
                        <label for="fdeson" class="form-label">File Destroyed On</label>
                        <input type="date" name="fdeson" id="fdeson" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="note" class="form-label">Note</label>
                        <textarea id="note" class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mt-3">
                        <div class="row g-3 mt-3">
                            <div class="col-sm-4 d-flex align-items-center text-nowrap gap-2">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center text-nowrap gap-2">
                                <button type="reset" class="btn btn-primary">Reset</button>
                            </div>
                            <div class="col-sm-4 d-flex align-items-center text-nowrap gap-2">
                                Add more data...
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
       /*  document.getElementById('recback').addEventListener('change', function() {
            if (this.checked) {
                document.getElementById('bakrron').value = '';
            }
        }); */
        document.getElementById('bakoffice').addEventListener('change', function() {
            document.getElementById('bakrron').value = '';            
            document.getElementById('dname').value='';
            document.getElementById('offname').value='';
        });
    </script>
</body>

</html>