<?php
$currPage = 'back_Settings_team_admin';
include 'app/controller/PageController.php';

if(isset($_POST['saveImpressum'])){
    $SQL = $db->prepare("UPDATE `settings` SET `impressum` = :impressum");
    $SQL->execute(array(":impressum" => $_POST['impressum']));

    echo sendSuccess('Impressum wurde gespeichert');
}

if(isset($_POST['saveAGB'])){
    $SQL = $db->prepare("UPDATE `settings` SET `agb` = :agb");
    $SQL->execute(array(":agb" => $_POST['agb']));

    echo sendSuccess('AGBs wurde gespeichert');
}

if(isset($_POST['saveDatenschutz'])){
    $SQL = $db->prepare("UPDATE `settings` SET `datenschutz` = :datenschutz");
    $SQL->execute(array(":datenschutz" => $_POST['datenschutz']));

    echo sendSuccess('Datenschutz wurde gespeichert');
}

if(isset($_POST['savesiteName'])){
    $SQL = $db->prepare("UPDATE `settings` SET `sitename` = :sitename");
    $SQL->execute(array(":sitename" => $_POST['sitename']));

    echo sendSuccess('Sitename wurde gespeichert');
}

if(isset($_POST['savesiteNameBig'])){
    $SQL = $db->prepare("UPDATE `settings` SET `siteNameBig` = :siteNameBig");
    $SQL->execute(array(":siteNameBig" => $_POST['siteNameBig']));

    echo sendSuccess('siteNameBig wurde gespeichert');
}

if(isset($_POST['savesiteNameSmall'])){
    $SQL = $db->prepare("UPDATE `settings` SET `siteNameSmall` = :siteNameSmall");
    $SQL->execute(array(":siteNameSmall" => $_POST['siteNameSmall']));

    echo sendSuccess('siteNameSmall wurde gespeichert');
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?= $helper->url(); ?>"><?= $helper->siteName(); ?></a></li>
                        <li class="breadcrumb-item active"><?= $currPageName; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-4">
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>Site name:</label>
                                <textarea name="sitename" rows="2" class="form-control"><?= $helper->getSetting('sitename'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="savesiteName">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>Site name big:</label>
                                <textarea name="siteNameBig" rows="2" class="form-control"><?= $helper->getSetting('siteNameBig'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="savesiteNameBig">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-4">
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>Site name small:</label>
                                <textarea name="siteNameSmall" rows="2" class="form-control"><?= $helper->getSetting('siteNameSmall'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="savesiteNameSmall">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-12">
                    <br>
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>Impressum:</label>
                                <textarea name="impressum" rows="20" class="form-control"><?= $helper->getSetting('impressum'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="saveImpressum">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-12">
                    <br>
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>AGB:</label>
                                <textarea name="agb" rows="20" class="form-control"><?= $helper->getSetting('agb'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="saveAGB">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-12">
                    <br>
                    <form method="post">
                        <div class="card">
                            <div class="card-body">
                                <label>Datenschutz:</label>
                                <textarea name="datenschutz" rows="20" class="form-control"><?= $helper->getSetting('datenschutz'); ?></textarea>
                                <br>
                                <button type="submit" class="btn btn-primary btn-block" name="saveDatenschutz">Speichern</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>