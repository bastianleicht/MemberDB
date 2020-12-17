<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $currPageName; ?> | <?= $helper->siteName(); ?></title>
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>vendors/flag-icon-css/css/flag-icon.min.css"/>
    <link rel="stylesheet" href="<?= $helper->cdnUrl() ?>css/horizontal-layout-dark/style.css">
    <link rel="shortcut icon" href="<?= $helper->cdnUrl() ?>images/favicon.png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
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