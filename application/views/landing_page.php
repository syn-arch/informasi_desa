<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Desa</title>
    <link rel="shortcut icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/favicon.ico') ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>node_modules/owl.carousel/dist/assets/owl.theme.default.min.css">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light border-bottom fixed-top">
        <div class="container py-2">
            <a class="navbar-brand fw-bold" href="#home">Sistem Informasi Desa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="me-auto"></div>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link btn-pink text-white px-4" href="<?= base_url('login') ?>">Masuk</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- end navbar -->

<!-- home -->
<div class="container home" id="home">
    <div class="row">
        <div class="col-md-6">
            <h1 class="fw-bold">SISTEM INFORMASI DESA</h1>
            <p>Atur data kependudukan desa dengan mudah dan cepat</p>
            <p>Dengan aplikasi ini, sekarang semua proses input data akan lebih terasa mudah dan cepat karena sudah tersedia berbagai fitur untuk mengelola data kependudukan, dapat dilakukan dimana saja dan kapan saja.</p>
            <div class="home-button mt-4">
                <a href="<?php echo base_url('login') ?>" class="btn btn-pink text-white px-5 py-2 mr-3 mt-2 btn-pink-block">Masuk
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="<?= base_url() ?>assets/img/home.svg" alt="" class="img-fluid mt-3">
        </div>
    </div>
</div>
<!-- end home -->

<!-- footer -->
<footer class="mt-5">
    <div class="container text-white">
        <div class="row py-5">
            <div class="col-md-4">
                <h4>Sistem Informasi Desa</h4>
                <p>Atur data kependudukan desa dengan mudah dan cepat</p>
            </div>
            <div class="col-md-2 offset-md-3">
                <h5>QUICK LINKS</h5>
                <ul class="list-unstyled">
                    <li><a href="#home" class="text-white">Home</a></li>
                    <li><a href="#whychoiceus" class="text-white">Why Choice Us</a></li>
                    <li><a href="#pricing" class="text-white">Pricing</a></li>
                    <li><a href="#testimonials" class="text-white">Testimonials</a></li>
                    <li><a href="#contact" class="text-white">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-2">
                <h5>SOCIAL MEDIA</h5>
                <ul class="list-unstyled">
                    <li><a href="" class="text-white">Facebook</a></li>
                    <li><a href="" class="text-white">Youtube</a></li>
                    <li><a href="" class="text-white">Instagram</a></li>
                    <li><a href="" class="text-white">Whatsapp</a></li>
                    <li><a href="" class="text-white">Telegram</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- end footer -->

</body>

<script src="<?= base_url() ?>node_modules/@fortawesome/fontawesome-free/js/all.min.js"></script>
<script src="<?= base_url() ?>node_modules/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>node_modules/owl.carousel/dist/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>assets/js/app.js"></script>

</html>
