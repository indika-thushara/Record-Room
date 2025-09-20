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
            <div class="col-md-8">

                <?php

                if (isset($_GET['error'])) {
                    if ($_GET['error'] == 1) {
                        echo "<div class='alert alert-danger' role='alert'>Username or password is invalid.</div>";
                    }
                }

                ?>
                <div class="formHeader">
                    <h4>Login</h4>
                </div>
                <form action="authenticate.php" method="post" class="p-4">
                    <div class="mt-3">
                        <label for="uname" class="form-label">Username</label>
                        <input type="text" name="uname" id="uname" class="form-control maxtext-width" placeholder="Username">
                    </div>
                    <div class="mt-3">
                        <label for="pwd" class="form-label">Password</label>
                        <input type="password" name="pwd" id="pwd" class="form-control" placeholder="Password">
                    </div>

                    <div class="mt-3">

                        <button type="submit" class="btn btn-primary w-100 g-3 mt-3">Login</button>

                    </div>

                </form>

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