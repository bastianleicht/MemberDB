<?php
$currPage = 'auth_Login';
include 'app/controller/PageController.php';
include 'app/manager/customer/auth/login.php';
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="main-panel">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img>
                            </div>
                            <h4><?= $helper->siteName(); ?></h4>
                            <h6 class="font-weight-light">Login!</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <input style="color:white" type="email" value="<?= $_POST['email']; ?>" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="E-Mail">
                                </div>
                                <div class="form-group">
                                    <input style="color:white" type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Dein Passwort">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="login">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input">
                                            Login merken?
                                        </label>
                                    </div>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Du hast noch keinen Account? <a href="<?= $helper->url(); ?>register" class="text-primary">Account erstellen</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>