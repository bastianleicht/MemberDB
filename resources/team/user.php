<?php
$currPage = 'back_Benutzerverwaltung_team_admin';
include 'app/controller/PageController.php';

$id = $helper->protect($_GET['id']);

if(isset($_POST['updateUser'])){
    $SQL = $db->prepare("UPDATE `users` SET `state`=? ,`role`=?,`username`=?,`email`=?,`member_limit`=? WHERE `id` = ?");
    $SQL->execute(array($_POST['state'], $_POST['role'], $_POST['username'], $_POST['email'], $_POST['member_limit'], $id));

    echo sendSuccess('Der Benutzer wurde bearbeitet');
    header('refresh:3;url=' . $helper->url() . 'team/users');
}

$SQL = $db->prepare("SELECT * FROM `users` WHERE `id` = :id");
$SQL->execute(array(":id" => $id));
$userData = $SQL->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['login'])){
    setcookie('old_session_token', $_COOKIE['session_token'], time()+864000,'/');
    setcookie('session_token', $userData['session_token'], time()+864000,'/');
    die(header('Location: '.$helper->url()));
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
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Benutzer <?= $user->getDataById($id, 'username'); ?> bearbeiten</div>
                        <div class="card-body">
                            <form method="post">

                                <label>Status:</label>
                                <select class="form-control" name="state">
                                    <option <?php if($userData['state'] == 'active'){ echo 'selected'; } ?> value="active">Aktiv</option>
                                    <option <?php if($userData['state'] == 'disabled'){ echo 'selected'; } ?> value="disabled">Deaktiviert</option>
                                </select>
                                <br>

                                <label>Rang:</label>
                                <select class="form-control" name="role">
                                    <option <?php if($userData['role'] == 'customer'){ echo 'selected'; } ?> value="customer">Kunde</option>
                                    <option <?php if($userData['role'] == 'admin'){ echo 'selected'; } ?> value="admin">Admin</option>
                                </select>
                                <br>

                                <label>Benutzername:</label>
                                <input class="form-control" name="username" value="<?= $userData['username']; ?>" required="required">
                                <br>

                                <label>E-Mail:</label>
                                <input class="form-control" name="email" value="<?= $userData['email']; ?>" required="required">
                                <br>

                                <label>Member Limit:</label>
                                <input class="form-control" name="member_limit" value="<?= $userData['member_limit']; ?>" required="required">
                                <br>

                                <button type="submit" name="updateUser" class="btn btn-primary btn-block">Speichern</button>

                                <br>

                                <button class="btn btn-warning btn-block" type="submit" name="login">Als Kunde einloggen</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>