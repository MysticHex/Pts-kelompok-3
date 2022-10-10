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
                    <?php if ($this->session->flashdata('error_msg') != null) { ?>
                        <div class="alert alert-danger">
                            <?= $this->session->flashdata('error_msg'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('scs_msg') != null) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('scs_msg'); ?>
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
                            <div class="col-4 text-center">
                                <img width="120px" height="180px" src="" id="img">
                            </div>
                            <div class="col-8">
                                <?= form_open_multipart('admin/add_data'); ?>
                                <table>
                                    <tr>
                                        <td class="text-light">Judul</td>
                                        <td class="text-light">:</td>
                                        <td class="text-light">
                                            <input type="text" name="judul" id="">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-light">Durasi</td>
                                        <td class="text-light">:</td>
                                        <td class="text-light"><input type="time" name="durasi" id=""></td>
                                    </tr>

                                    <tr class="form-group">
                                        <td class="text-light">Deskripsi</td>
                                        <td class="text-light">:</td>
                                        <td class="text-light"><textarea name="deskripsi" id="" cols="30" rows="3"></textarea></td>
                                    </tr>
                                    <tr class="form-group">
                                        <td class="text-light">Image</td>
                                        <td class="text-light">:</td>
                                        <td class="text-light">
                                            <input type="file" name="teaser_imager" id="imgInp" accept="image/*">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="text-center pt-3"><button class="btn btn-outline-light">Add</button></td>
                                    </tr>
                                </table>
                                <?= form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap/dist/js/bootstrap.min.js') ?>">
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                img.src = URL.createObjectURL(file)
            }
        }
    </script>
</body>

</html>