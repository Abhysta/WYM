<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $judul ?></title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/style1.css" type="text/css">
    <link rel="stylesheet" href="<?= base_url()?>/assets/css/about.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                            <img src="<?= base_url()?>/assets/img/logo1.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="<?= base_url()?>admin">For you</a></li>
                                <li><a href="<?= base_url()?>admin/genre">Genre</a></li>
                                <?php $country = $this->m_admin->get_country(); ?>
                                <li><a href="#" class="nav-link">Country<span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown mt-1" style="width: 200px;">
                                        <?php foreach ($country as $c => $value) { ?>
                                        <li><a href="<?= base_url('admin/country/'. $value->id_country) ?>"><?= $value->nama_country?></a></li> 
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="<?= base_url()?>admin/advanced">Advance search</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="#" class="search-switch"><span class="icon_search"></span></a></li>
                                <li><a><span class="icon_profile arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="./login.html"><?= $user['name'];?></a></li>
                                        <li><a href="./login.html"><?= $user['email'];?></a></li>
                                        <li><a href="<?=  base_url('auth/logout')?>">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->