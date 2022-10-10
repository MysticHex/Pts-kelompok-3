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
    <div class="main rounded my-5 mx-auto px-5 py-5" style="width:fit-content+8rem; height:fit-content;">
        <div class="head">
            <h2 class="pt-2 mx-auto">Login</h2>
        </div>

        <div class="mx-auto" style="width:270px;">
            <?= $this->session->flashdata('message'); ?>
        </div>

        <div class="container mt-5 mx-auto" style="width: fit-content; height:fit-content;">
            <form action="login" method="post" style="width: 28em;">
                <div class="form-group">
                    <label for="usn" class="form-label">Masukan username</label>
                    <input type="text" name="usn" id="usn" class="form-control">
                    <small class="text-danger"><?= form_error('usn'); ?></small>
                </div>

                <div class="form-group">
                    <label for="pw" class="form-label mt-3">Masukan password</label>
                    <input type="password" name="password" id="usn" class="form-control">
                    <small class="text-danger"><?= form_error('password'); ?></small>
                </div>

                <div class="form-group mx-auto mt-5" style="width: fit-content">
                    <button type="submit" class="btn btn-primary px-3 py-2">Login</button>
                </div>

                <hr>
                <div class="fs-6 mx-auto mt-2 p" style="width:fit-content;">
                    Doesn't have an account? <?= anchor('pts/register', 'Register'); ?>
                </div>
            </form>
        </div>
    </div>
    <script src="<?=base_url('node_modules/bootstrap/dist/js/bootstrap.min.js')?>"></script>
</body>

</html>