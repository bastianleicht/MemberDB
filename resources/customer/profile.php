<?php
$currPage = 'back_Mein Profil';
include 'app/controller/PageController.php';

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $helper->url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $currPageName; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mein Profil</h3>
                        </div>
                        <div class="card-body">
                            <label>Benutzername</label>
                            <input value="<?= $username; ?>" readonly style="color: white;" class="form-control">
                            <br>
                            <label>E-Mail</label>
                            <input value="<?= $mail; ?>" readonly style="color: white;" class="form-control">
                            <br>
                            <label>Kundennummer</label>
                            <input value="KD-<?= $userid; ?>" readonly style="color: white;" class="form-control">
                            <br>
                            <label>Member Limit</label>
                            <input value="<?= $member_slots; ?>" readonly style="color: white;" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>