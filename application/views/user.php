<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <style>
        body {
            background-color: #5A5964;
        }
    </style>
</head>

<body>
    <header class="p-3 text-bg-dark " style="height:fit-content+30px;">
        <div class="container d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ms-4">
            <a href="index" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-5">
                <img src="<?= base_url('asset/ticket.png') ?>" alt="">
            </a>
        </div>
    </header>

    <div class="mt-5 mx-auto" style="width:720px; height: 320px; background-color:#D9D9D9;">
        <div class="container mx-auto pt-3" style="width:fit-content;">
            <img src="<?= base_url('asset/user.png') ?>" alt="" class="border border-dark rounded-circle">
            <br>
            <h4 class="text-center"><?=$this->session->userdata('username')?></h4>
        </div>

        <div class="">
            <a href="tiket" class="text-decoration-none text-dark">
                <div class="container w-50 border border-dark">Riwayat pesanan</div>
            </a>
        </div>
        <div class="mt-3"></div>
        <div class="">
            <a href="tiket_aktif" class="text-decoration-none text-dark">
                <div class="container w-50 border border-dark">Pesanan aktif</div>
            </a>
        </div>

        <div class="mx-auto mt-2" style="width:fit-content;">
            <a href="<?=base_url('index.php/home/logout')?>" class="text-decoration-none text-dark">
                <div class="btn btn-danger">Logout</div>
            </a>
        </div>
    </div>

    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>">

</body>

</html>