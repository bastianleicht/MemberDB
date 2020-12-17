<?php
$currPage = 'back_Dashboard';
include 'app/controller/PageController.php';

if (isset($_POST['createMember'])) {
    $error = null;

    if (empty($_POST['username'])) {
        $error = 'Bitte füge einen Username hinzu!';
    }

    if (empty($_POST['rlname'])) {
        $error = 'Bitte füge einen Reallife Namen hinzu!';
    }

    if (empty($_POST['fnname'])) {
        $error = 'Bitte füge einen Fortnite Namen hinzu!';
    }

    if (empty($_POST['alter'])) {
        $error = 'Bitte füge einen Alter hinzu!';
    }

    if (empty($_POST['team'])) {
        $error = 'Bitte wähle ein Team aus';
    }

    if (empty($_POST['trackerlink'])) {
        $error = 'Bitte füge einen Tracker Link hinzu!';
    }

    if ($member_slots <= $user->memberCount()) {
        $error = 'Das Member Limit wurde erreicht';
    }

    if ($user_memberslots <= $user->serviceCount($userid)) {
        $error = 'Du hast dein Member Limit erreicht';
    }

    if (empty($error)) {
        $bot->create($_COOKIE['session_token'], $helper->protect($_POST['username']), $_POST['rlname'], $_POST['fnname'], $_POST['alter'], $_POST['trackerlink'], $_POST['team'], $_POST['socials'], $_POST['eigenschaften'], $_POST['zukunft'], $_POST['cws']);
        echo sendSuccess('Member wurde erstellt');
    } else {
        echo sendError($error);
    }
}

?>
<form method="post">
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Neuen Member erstellen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Username:</label>
                    <input name="username" placeholder="Benutzername" class="form-control">

                    <br>
                    <label>Reallife Name:</label>
                    <input name="rlname" placeholder="Max Mustermann" class="form-control">

                    <br>
                    <label>Fortnite Name:</label>
                    <input name="fnname" placeholder="Fortnite Name" class="form-control">

                    <br>
                    <label>Alter:</label>
                    <input name="alter" placeholder="Das Alter" class="form-control">

                    <br>
                    <label>Tracker Link:</label>
                    <input name="trackerlink" placeholder="https://fortnitetracker.com/profile/all/" class="form-control">

                    <br>
                    <label>Team:</label>
                    <select class="form-control" name="team" required="required">
                        <?php
                        $SQL = $db->prepare("SELECT * FROM `member_teams` WHERE `state` = 'active'");
                        $SQL->execute();
                        if ($SQL->rowCount() != 0) {
                            while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
                        <?php }
                        } ?>
                    </select>

                    <br>
                    <label>Socials:</label>
                    <input name="socials" placeholder="Twitter, Youtube, Twitch" class="form-control">

                    <br>
                    <label>Stärken & Schwächen:</label>
                    <input name="eigenschaften" placeholder="Aim, Building" class="form-control">

                    <br>
                    <label>Zukunftspläne:</label>
                    <input name="zukunft" placeholder="-" class="form-control">

                    <br>
                    <label>Teilnahme an ClanWars?</label>
                    <select class="form-control" name="cws" required="required">
                        <option value="ja">Ja</option>
                        <option value="nein">Nein</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" name="createMember">Member erstellen</button>
                </div>
            </div>
        </div>
    </div>
</form>

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

    <div class="row justify-content-center">
        <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
            <div class="card icon-card-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                            <i class="mdi mdi-robot"></i>
                        </div>
                        <p class="font-weight-medium mb-0">Version</p>
                    </div>
                    <div class="d-flex align-items-center mt-3 flex-wrap">
                        <h3 class="font-weight-medium mb-0 mr-2">v1.2.0-BETA</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
            <div class="card icon-card-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                            <i class="mdi mdi-truck"></i>
                        </div>
                        <p class="font-weight-medium mb-0">Meine Member</p>
                    </div>
                    <div class="d-flex align-items-center mt-3 flex-wrap">
                        <h3 class="font-weight-medium mb-0 mr-2"><?= $user->serviceCount($userid); ?> / <?= $user_memberslots ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3 grid-margin stretch-card">
            <div class="card icon-card-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="icon mb-0 mb-md-2 mb-xl-0 mr-2">
                            <i class="mdi mdi-truck"></i>
                        </div>
                        <p class="font-weight-medium mb-0">Alle Member</p>
                    </div>
                    <div class="d-flex align-items-center mt-3 flex-wrap">
                        <h3 class="font-weight-medium mb-0 mr-2"><?= $user->allMemberCount(); ?> / <?= $member_slots; ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Neuen Member erstellen
    </button>
    <br>
    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Meine erstellten Member
                </div>
                <div class="card-body">
                    <table id="dataTableDE" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Erstellt am</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $SQL = $db->prepare("SELECT * FROM `member` WHERE `user_id` = :user_id AND `deleted_At` IS NULL ORDER BY `id` DESC LIMIT 10");
                            $SQL->execute(array(":user_id" => $user->getDataBySession($_COOKIE['session_token'], 'id')));
                            if ($SQL->rowCount() != 0) {
                                while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {

                                    if (is_null($row['state'])) {
                                        $state = 'Gelöscht';
                                    } else {
                                        $state = 'Aktiv';
                                    }

                            ?>
                                    <tr>
                                        <td><?= $row['id']; ?></td>
                                        <td><?= $helper->protect($row['username']); ?></td>
                                        <td><?= $state ?></td>
                                        <td><?= $helper->formatDate($row['created_at']); ?></td>
                                        <td><a href="<?= $helper->url(); ?>member/<?= $row['id']; ?>"><button class="btn btn-primary btn-sm">Verwalten</button></a></td>
                                    </tr>
                            <?php }
                            } ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

    </div>
</div>