<?php
$currPage = 'back_Member_team_admin';
include 'app/controller/PageController.php';

$id = $helper->protect($_GET['id']);

if (isset($_POST['updateMember'])) {
    $SQL = $db->prepare("UPDATE `member` SET `username`=? ,`rlname`=?,`fnname`=?,`member_alter`=?,`tracker`=?,`team_id`=?,`socials`=?, `eigenschaften`=?, `zukunft`=?, `cws`=? WHERE `id` = ?");
    $SQL->execute(array($_POST['username'], $_POST['rlname'], $_POST['fnname'], $_POST['alter'], $_POST['trackerlink'], $_POST['team'], $_POST['socials'], $_POST['eigenschaften'], $_POST['zukunft'], $_POST['cws'], $id));

    echo sendSuccess('Member wurde bearbeitet');
}

if (isset($_POST['deleteMember'])) {

    // echo sendInfo('Diese Funktion ist derzeit Deaktiviert!');

    $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
    $datetime = $date->format('Y-m-d H:i:s');

    $SQL = $db->prepare("UPDATE `member` SET `state` = :state, `deleted_at` = :deleted_at WHERE `id` = :id");
    $SQL->execute(array(":state" => 'deleted', ":deleted_at" => $datetime, ":id" => $id));

    echo sendSuccess('Member wurde erfolgreich gelöscht!');
}

$SQL = $db->prepare("SELECT * FROM `member` WHERE `id` = :id");
$SQL->execute(array(":id" => $id));
$member_data = $SQL->fetch(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <form method="post">
                        <button type="submit" name="deleteMember" class="btn btn-primary">Member Löschen</button>
                    </form>
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

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Member editieren</div>
                        <div class="card-body">
                            <form method="post">

                                <label>Username:</label>
                                <input class="form-control" name="username" value="<?= $member_data['username']; ?>" required="required">
                                <br>

                                <label>Reallife Name:</label>
                                <input class="form-control" name="rlname" value="<?= $member_data['rlname']; ?>">

                                <br>

                                <label>Fortnite Name:</label>
                                <input class="form-control" name="fnname" value="<?= $member_data['fnname']; ?>">

                                <br>

                                <label>Alter:</label>
                                <input class="form-control" name="alter" value="<?= $member_data['member_alter']; ?>">

                                <br>

                                <label>Tracker Link:</label>
                                <input class="form-control" name="trackerlink" value="<?= $member_data['tracker']; ?>">

                                <br>

                                <label>DVT Team:</label>
                                <select class="form-control" name="team" required="required">
                                    <option <?php if ($member_data['team_id'] == '1') {
                                                echo 'selected';
                                            } ?> value="1">Main Team</option>
                                    <option <?php if ($member_data['team_id'] == '2') {
                                                echo 'selected';
                                            } ?> value="2">Second Team</option>
                                </select>

                                <br>

                                <label>Socials:</label>
                                <input class="form-control" name="socials" value="<?= $member_data['socials']; ?>">

                                <br>

                                <label>Stärken & Schwächen:</label>
                                <input class="form-control" name="eigenschaften" value="<?= $member_data['eigenschaften']; ?>">

                                <br>

                                <label>Zukunftspläne:</label>
                                <input class="form-control" name="zukunft" value="<?= $member_data['zukunft']; ?>">

                                <br>

                                <label>Teilnahme an Cws / Cwls?</label>
                                <select class="form-control" name="cws" required="required">
                                    <option <?php if ($member_data['cws'] == 'ja') {
                                                echo 'selected';
                                            } ?> value="1">Ja</option>
                                    <option <?php if ($member_data['cws'] == 'nein') {
                                                echo 'selected';
                                            } ?> value="2">Nein</option>
                                </select>
                                <br>

                                <button type="submit" name="updateMember" class="btn btn-primary btn btn-block">Speichern</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>