<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #5A5964;
        }

        .main {
            width: 800px;
            height: 500px;
            background-color: #D9D9D9;
        }

        h2 {
            width: fit-content;
        }
    </style>
</head>

<body>
    <div class="main rounded my-5 mx-auto p-5" style="width:fit-content+8em; height:fit-content">
        <div class="head">
            <h2 class="pt-2 mx-auto">Register</h2>
        </div>

        <div class="container mt-5 mx-auto" style="width: fit-content;">
            <form action="register" method="post" style="width: 28em;">
                <div class="form-group">
                    <label for="usn" class="form-label">Masukan username</label>
                    <input type="text" name="usn" id="usn" class="form-control">
                    <?= form_error('usn', '<small class="text-danger ps-1">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label for="pw" class="form-label mt-3">Masukan password</label>
                    <input type="password" name="pw" id="pw" class="form-control">
                    <?= form_error('pw','<small class="text-danger">','</small>'); ?>
                    
                </div>

                <div class="form-group">
                    <label for="pwc" class="form-label mt-3">Konfirmasi password</label>
                    <input type="password" name="pwc" id="pwc" class="form-control">
                    <?= form_error('pwc','<small class="text-danger">','</small>'); ?>

                </div>

                <div class="mx-auto mt-5" style="width: fit-content">
                    <button type="submit" id="btn" class="btn btn-primary px-3 py-2">Register</button>
                </div>

                <hr>
                <div class="fs-6 mx-auto mt-2" style="width:fit-content;">
                    Already have an account? <?= anchor('pts/login', 'Login'); ?>
                </div>
            </form>
        </div>
    </div>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>