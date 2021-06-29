<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title ?></title>
    <link href="<?= base_url('assets/user/') ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/user/') ?>css/styles.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css" type="text/css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#"><?= $subtitle ?></a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home') ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home/#produk') ?>">Produk kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('home/#profil') ?>">Profil</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('keranjang') ?>">Keranjang</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('pesanan-saya') ?>">Pesanan Saya</a></li>
                    <?php if (get_instance()->session->userdata('login') == FALSE) { ?>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('Auth') ?>">Login</a></li>
                <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php $this->load->view($page) ?>

    <footer class="page-footer" style="margin-top: 41px;">
        <div class="container">
            <div class="social-icons"><a href="#"><i class="icon ion-social-facebook"></i></a><a href="#"><i class="icon ion-social-instagram-outline"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a></div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="<?= base_url('assets/user/') ?>js/script.min.js"></script>
</body>

</html>