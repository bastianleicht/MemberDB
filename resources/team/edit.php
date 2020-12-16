<?php
$currPage = 'back_Teamverwaltung_team_admin';
include 'app/controller/PageController.php';

$id = $helper->protect($_GET['id']);

if (isset($_POST['updateTeam'])) {
    $SQL = $db->prepare("UPDATE `member_teams` SET `name`=? ,`state`=? WHERE `id` = ?");
    $SQL->execute(array($_POST['name'], $_POST['state'], $id));

    echo sendSuccess('Das Team wurde bearbeitet');
}

if (isset($_POST['deleteTeam'])) {

    $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
    $datetime = $date->format('Y-m-d H:i:s');

    $SQL = $db->prepare("UPDATE `member_teams` SET `state` = :state, `deleted_at` = :deleted_at WHERE `id` = :id");
    $SQL->execute(array(":state" => 'disabled', ":deleted_at" => $datetime, ":id" => $id));

    echo sendSuccess('Member wurde erfolgreich gelöscht!');
}

$SQL = $db->prepare("SELECT * FROM `member_teams` WHERE `id` = :id");
$SQL->execute(array(":id" => $id));
$team_data = $SQL->fetch(PDO::FETCH_ASSOC);

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
                <div class="col-sm-6">
                    <form method="post">
                        <button type="submit" name="deleteTeam" class="btn btn-primary float-sm-right">Team Löschen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Team editieren</div>
                        <div class="card-body">
                            <form method="post">

                                <label>Status:</label>
                                <select class="form-control" name="state">
                                    <option <?php if ($team_data['state'] == 'active') {
                                                echo 'selected';
                                            } ?> value="active">Aktiv</option>
                                    <option <?php if ($team_data['state'] == 'disabled') {
                                                echo 'selected';
                                            } ?> value="disabled">Deaktiviert</option>
                                </select>
                                <br>

                                <label>Name:</label>
                                <input class="form-control" name="name" value="<?= $team_data['name']; ?>" required="required">
                                <br>

                                <button type="submit" name="updateTeam" class="btn btn-primary btn btn-block">Speichern</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>