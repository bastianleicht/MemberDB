<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

$currPage = 'auth_Register';
include 'app/controller/PageController.php';
include 'app/manager/customer/auth/register.php';
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="main-panel">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">

                            <h4><?= $helper->siteName(); ?></h4>
                            <h6 class="font-weight-light">Registrierung!</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Benutzername">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="E-Mail">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Dein Passwort">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password_repeat" class="form-control form-control-lg" placeholder="Dein Passwort wiederholen">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="register">Account erstellen</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Du hast bereits einen Account? <a href="<?= $helper->url(); ?>login" class="text-primary">Logge dich ein!</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Mit dem Regestrieren akzeptierst du die <a href="<?= $helper->url(); ?>agb" class="text-primary">AGB's!</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>