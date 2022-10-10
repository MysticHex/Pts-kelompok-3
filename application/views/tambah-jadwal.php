<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>">
    <style>
        body {
            background-color: #5A5964;
        }
    </style>
</head>

<body>
    <header class="p-3 text-bg-dark">

        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="<?= base_url('index.php/home/admin') ?>" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-5">
                    <img src="<?= base_url('asset/ticket.png') ?>" alt="">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <?php if($this->session->flashdata('error_msg')!=null){ ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error_msg'); ?>
                        </div>
                    <?php } ?>
                </ul>

                <div class="me-4">
                    <a href="<?= base_url('index.php/home/user') ?>"><img src="<?= base_url('asset/user.png') ?>" alt="" height="42px" class="border border-5-white rounded-circle"></a>
                </div>


                <div class="text-end">
                    <a href="<?= base_url('index.php/home/logout') ?>"><button type="button" class="btn btn-outline-danger me-2">logout</button></a>
                    <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
                </div>


            </div>
        </div>

    </header>
    <div class="mt-5">

    </div>
    </div>

    <div class="mt-5 container">
        <div class="container">
            <div class="row">
                <div class="col mb-5 me-2">
                    <div class="container py-3" style="width: 720px; height:fit-content+70px; background-color:#732219;">
                        <div class="row">
                            <?php foreach ($book as $b) { ?>
                                <div class="col-4">
                                    <img width="120px" height="180px" src="<?= base_url('asset/teaser/' . $b->teaser) ?>" alt="">
                                </div>
                                <div class="col-8">
                                    <table>
                                        <tr>
                                            <td class="text-light">Judul</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= $b->nama_film; ?></td>
                                        </tr>

                                        <tr>
                                            <td class="text-light">Durasi</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= date_format(date_create($b->durasi_film), "g") . " Jam" . " " . date_format(date_create($b->durasi_film), "i") . " Menit" ?></td>
                                        </tr>

                                        <tr>
                                            <td class="text-light">Deskripsi</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= $b->deskripsi_film; ?></td>
                                        </tr>
                                        <form action="<?=base_url('index.php/admin/insert_jadwal')?>" method="post">
                                            <tr class="text-light">
                                                <td>Tanggal tayang</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="date" name="tgl" id="" min="<?=date("Y-m-d")?>">
                                                </td>
                                            </tr>
                                            <tr class="text-light">
                                                <td>Waktu tayang</td>
                                                <td>:</td>
                                                <td>
                                                    <input type="time" name="waktu" id="">
                                                </td>
                                            </tr>
                                            <input type="hidden" name="slug" value="<?=$slug?>">
                                    </table>
                                <?php } ?>
                                </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto" style="width: fit-content;">
                                <button type="submit" class="btn btn-outline-light">Insert</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>">

</body>

</html>