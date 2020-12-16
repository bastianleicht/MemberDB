<?php
$currPage = 'front_Datenschutz';
include 'app/controller/PageController.php';
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"><?= $currPageName; ?></h1>

            <?= $helper->getSetting('datenschutz'); ?>

        </div>
    </div>
</div>
