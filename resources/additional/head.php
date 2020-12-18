<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="57x57" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= $helper->cdnUrl() ?>images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?= $helper->cdnUrl() ?>images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= $helper->cdnUrl() ?>images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?= $helper->cdnUrl() ?>images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $helper->cdnUrl() ?>images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?= $helper->cdnUrl() ?>images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?= $helper->cdnUrl() ?>images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title><?= $currPageName; ?> | <?= $helper->siteName(); ?></title>
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/flag-icon-css/css/flag-icon.min.css"/>
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>css/horizontal-layout-dark/style.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/1063e48ab5.js" crossorigin="anonymous"></script>
</head>

<?php

if(strpos($currPage,'auth_') !== false) {
//    echo '<body class="hold-transition login-page">';
} elseif (strpos($currPage,'back_') !== false) {
//    echo '<body class="hold-transition sidebar-mini"><div class="wrapper">';
}

?>

<body>
<div class="container-scroller">
    <div class="horizontal-menu">