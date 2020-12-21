<?php
$currPage = 'back_Member';
include 'app/controller/PageController.php';

$id = $helper->protect($_GET['id']);

$SQL = $db->prepare("SELECT * FROM `member` WHERE `id` = :id");
$SQL->execute(array(":id" => $id));
$member_data = $SQL->fetch(PDO::FETCH_ASSOC);

if(!($member_data > 0)) {
    die(header('Location: '.$helper->url()));
}

if (isset($_POST['editMember'])) {
    $error = null;

    if (empty($_POST['username'])) {
        $error = 'Bitte füge einen Username hinzu!';
    }

    if(preg_match("/^[a-zA-Z0-9]+$/", $_POST['username']) == 0){
        $error = 'Benutezrname enthält unerlaubte Zeichen';
    }

    if($_POST['username'] != $member_data['username']) {
        if($member->exists($_POST['username'])){
            $error = 'Ein Member mit diesem Benutzernamen existiert bereits';
        }
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

    if (empty($error)) {
        $SQL = $db->prepare("UPDATE `member` SET `username`=? ,`rlname`=?,`fnname`=?,`member_alter`=?,`tracker`=?,`team_id`=?,`socials`=?, `eigenschaften`=?, `zukunft`=?, `cws`=?, `bemerkungen`=?  WHERE `id` = ?");
        $SQL->execute(array($_POST['username'], $_POST['rlname'], $_POST['fnname'], $_POST['alter'], $_POST['trackerlink'], $_POST['team'], $_POST['socials'], $_POST['eigenschaften'], $_POST['zukunft'], $_POST['cws'], $_POST['bemerkungen'], $id));

        echo sendSuccess('Member wurde bearbeitet!');
        header('refresh:2;url=' . $helper->url() . 'stats/' . $id);
    } else {
        echo sendError($error);
    }
}

?>

<form method="post">
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-width: 1000px; margin: 1.75rem auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Member bearbeiten</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Username:</label>
                    <input name="username" value="<?= $member_data['username']?>" class="form-control">

                    <br>
                    <label>Reallife Name:</label>
                    <input name="rlname" value="<?= $member_data['rlname']?>" class="form-control">

                    <br>
                    <label>Fortnite Name:</label>
                    <input name="fnname" value="<?= $member_data['fnname']?>" class="form-control">

                    <br>
                    <label>Alter:</label>
                    <input name="alter" value="<?= $member_data['member_alter']?>" class="form-control">

                    <br>
                    <label>Tracker Link:</label>
                    <input name="trackerlink" value="<?= $member_data['tracker']?>" class="form-control">

                    <br>
                    <label>Team:</label>
                    <select class="form-control" name="team" required="required">
                        <?php
                        $SQL = $db->prepare("SELECT * FROM `member_teams` WHERE `state` = 'active'");
                        $SQL->execute();
                        if ($SQL->rowCount() != 0) {
                            while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['id']; ?>" <?php if($member_data['team_id'] == $row['id']) {echo 'selected';} ?> ><?= $row['name']; ?></option>
                            <?php }
                        } ?>
                    </select>

                    <br>
                    <label>Socials:</label>
                    <input name="socials" value="<?= $member_data['socials']?>" class="form-control">

                    <br>
                    <label>Stärken & Schwächen:</label>
                    <input name="eigenschaften" value="<?= $member_data['eigenschaften']?>" class="form-control">

                    <br>
                    <label>Zukunftspläne:</label>
                    <input name="zukunft" value="<?= $member_data['zukunft']?>" class="form-control">

                    <br>
                    <label>Teilnahme an ClanWars?</label>
                    <select class="form-control" name="cws" required="required">
                        <option <?php if ($member_data['cws'] == 'ja') {
                            echo 'selected';
                        } ?> value="ja">Ja</option>
                        <option <?php if ($member_data['cws'] == 'nein') {
                            echo 'selected';
                        } ?> value="nein">Nein</option>
                    </select>

                    <br>
                    <label>Benerkungen:</label>
                    <textarea class="form-control" rows="5" name="bemerkungen"><?= $member_data['bemerkungen']?></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" name="editMember">Speichern</button>
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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <img src="<?= $helper->picUrl() ?>profile/profile.png" alt="profile" class="img-lg rounded-circle mb-3"/>
                                <div class="mb-3">
                                    <h3><?= $member_data['username']?></h3>
                                </div>
                                <p class="w-75 mx-auto mb-3"><?= $member_data['bemerkungen']?></p>
                                <div class="d-flex justify-content-center">
                                    <form action="<?= $member_data['tracker'] ?>" method="get" target="_blank">
                                        <button class="btn btn-success btn-block mb-2">Tracker</button>
                                    </form>
                                </div>
                            </div>

                            <div class="border-bottom py-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Earnings</span>
                                    </div>
                                    <input class="form-control col-sm-9" value="<?= $earnings->getEarnings($member_data['id']); ?>€" readonly>
                                </div>
                            </div>
                            <!--
                            <div class="border-bottom py-4">
                                <div class="d-flex mb-3">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="55" style="width: 55%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="progress progress-md flex-grow">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="75" style="width: 75%" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="py-4">
                                <p class="clearfix">
                                    <span class="float-left">Status</span>
                                    <span class="float-right text-muted"><?= $member_data['state'] ?><span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">Phone</span>
                                    <span class="float-right text-muted">Soon</span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">Mail</span>
                                    <span class="float-right text-muted">Soon</span>
                                </p>

                                <p class="clearfix">
                                    <span class="float-left">Twitter</span>
                                    <span class="float-right text-muted"><a href="#">Soon</a></span>
                                </p>
                            </div>
                            <button class="btn btn-primary btn-block mb-2">Preview</button>
                        </div>

                        <div class="col-lg-8">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                            <div class="mt-4 py-2 border-top border-bottom">
                                <ul class="nav profile-navbar">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#">
                                            <i class="mdi mdi-account-outline"></i>
                                            Info
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="mdi mdi-chart-bar"></i>
                                            Stats
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">
                                            <i class="mdi mdi-newspaper"></i>
                                            Socials
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="profile-feed">
                                <br>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Reallife Name:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['rlname'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Fortnite Name:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['fnname'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Alter:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['member_alter'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Team:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member->getTeambyID($member_data['team_id']) ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Socials:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['socials'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Stärken & Schwächen:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['eigenschaften'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Zukunftspläne:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['zukunft'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Teilnahme an ClanWars:</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" value="<?= $member_data['cws'] ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Benerkungen:</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" rows="5" name="bemerkungen" readonly><?= $member_data['bemerkungen'] ?></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>