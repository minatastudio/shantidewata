<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $meta[0] ?></title>
    <meta name="title" content="<?php echo $meta[0] ?>">
    <meta name="description" content="<?php echo $meta[2] ?>">
    <meta name="keywords" content="<?php echo $meta[1] ?>">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="revisit-after" content="3 days">
    <meta name="author" content="minatastudio.com">

    <link rel="stylesheet" href="/assets/style/reset.css" />
    <link rel="stylesheet" href="/assets/style/normalize.css" />
    <!-- <link rel="stylesheet" href="/assets/plugin/select.min.css"> -->
    <script src="/assets/plugin/select.min.js"></script>
    <link rel="stylesheet" href="/assets/svgicon/style.css" />
    <link rel="stylesheet" href="/assets/style/style.css" />
</head>

<body>
    <header>
        <nav>
            <div class="navbar wrapper">
                <div class="logo">
                    <a href="<?php echo $root; ?>"><img src="/assets/image/logo.webp" alt="" /></a>
                </div>

                <div class="nav-links">
                    <div class="sidebar-logo">
                        <a href="<?php echo $root; ?>">
                            <img src="/assets/image/logo.webp" alt="" />
                            <i class="bx icon-close"></i>
                        </a>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="#">Property Management</a>
                            <i class="arrow-sub1 arrow icon-up-arrow"></i>
                            <ul class="js-sub-menu1 sub-menu">
                                <li><a href="<?php echo $root . "/page/design"; ?>">Design</a></li>
                                <li><a href="<?php echo $root . "/page/build"; ?>">Build</a></li>
                                <li><a href="<?php echo $root . "/page/management"; ?>">Management</a></li>
                                <li><a href="<?php echo $root . "/page/marketing"; ?>">Marketing</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Villa Sale</a>
                            <i class="htmlcss-arrow arrow icon-up-arrow"></i>
                            <ul class="htmlCss-sub-menu sub-menu">
                                <li><a href="<?php echo $root . "/page/villa/freehold"; ?>">Free Hold</a></li>
                                <li><a href="<?php echo $root . "/page/villa/leasehold"; ?>">Lease Hold</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Land Sale</a>
                            <i class="js-arrow arrow icon-up-arrow"></i>
                            <ul class="js-sub-menu sub-menu">
                                <li><a href="<?php echo $root . "/page/land/freehold"; ?>">Free Hold</a></li>
                                <li><a href="<?php echo $root . "/page/land/leasehold"; ?>">Lease Hold</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Other Sale</a>
                            <i class="arrow-sub2 arrow icon-up-arrow"></i>
                            <ul class="js-sub-menu2 sub-menu">
                                <li><a href="<?php echo $root . "/page/commercial/sale"; ?>">Commercial</a></li>
                                <li><a href="<?php echo $root . "/page/business/sale"; ?>">Business</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Villa Rental</a>
                            <i class="arrow-sub3 arrow icon-up-arrow"></i>
                            <ul class="js-sub-menu3 sub-menu">
                                <li><a href="<?php echo $root . "/page/villa-rental/daily-rent"; ?>">Daily</a></li>
                                <li><a href="<?php echo $root . "/page/villa-rental/long-lease"; ?>">Long Lease</a></li>
                            </ul>
                        </li>

                        <li><a href="<?php echo $root . "/page/about"; ?>">About</a></li>
                    </ul>
                </div>
                <div class="menu-icon">
                    <ul>
                        <li><i class="icon-menu"></i></li>
                        <li>
                            <a href="<?php echo $root; ?>"><i class="icon-home"></i></a>
                        </li>
                        <li>
                            <a href="<?php echo $root . "/page/contact"; ?>"><i class="icon-map"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>