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
    <header class="p-3 text-bg-dark">

        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-5">
                    <img src="<?= base_url('asset/ticket.png') ?>" alt="">
                </a>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <?php if ($this->session->flashdata('scs_msg') != null) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('scs_msg'); ?>
                        </div>
                    <?php } ?>
                </ul>

                <div class="me-4">
                    <a href="<?= base_url('index.php/home/user') ?>"><img src="<?= base_url('asset/user.png') ?>" alt="" height="42px" class="border border-5-white rounded-circle"></a>
                </div>


                <div class="text">
                    <a href="<?= base_url('index.php/admin/tambah_data') ?>"><button type="button" class="btn btn-outline-light me-3">Add Film</button></a>
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
            <div class="row row-cols-8">
                <?php foreach ($film as $f) { ?>
                    <div class="col mb-5 me-2">
                        <div class="container py-3" style="width: 560px; height:fit-content+70px; background-color:#732219;">
                            <div class="row">
                                <div class="col-4">
                                    <img width="120px" height="180px" src="<?= base_url('asset/teaser/' . $f->teaser) ?>" alt="">
                                </div>
                                <div class="col-8">
                                    <table>
                                        <tr>
                                            <td class="text-light">Judul</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= $f->nama_film; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-light">Durasi</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= date_format(date_create($f->durasi_film), "g") . " Jam " . date_format(date_create($f->durasi_film), "i") . " Menit"; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-light">Deskripsi</td>
                                            <td class="text-light">:</td>
                                            <td class="text-light"><?= $f->deskripsi_film; ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="mx-auto" style="width: fit-content;">
                                        <?= anchor('home/tambah_jadwal/' . $f->slug, '<button class="btn btn-success">Tambah jadwal</button>') ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mx-auto" style="width: fit-content;">
                                        <?= anchor('home/list_jadwal/' . $f->slug, '<button class="btn btn-primary">List Jadwal</button>') ?>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="mx-auto" style="width: fit-content;">
                                        <?= anchor('admin/delete/' . $f->slug, '<button class="btn btn-danger">Delete</button>') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>">

</body>

</html>