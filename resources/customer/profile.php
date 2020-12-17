<?php
$currPage = 'back_Mein Profil';
include 'app/controller/PageController.php';

if(isset($_POST['changePassword'])){
    if(isset($_POST['old_passwd']) && !empty($_POST['old_passwd'])){
        if(isset($_POST['new_passwd']) && !empty($_POST['new_passwd'])){
            if(isset($_POST['new_passwd_repeat']) && !empty($_POST['new_passwd_repeat'])){

                $SQLCheckLogin = $db->prepare("SELECT * FROM `users` WHERE `id` = :user_id");
                $SQLCheckLogin->execute(array(':user_id' => $userid));
                $notLoggedUserInfo = $SQLCheckLogin->fetch(PDO::FETCH_ASSOC);

                $loginState = FALSE;

                if(password_verify($_POST['old_passwd'], $notLoggedUserInfo['password'])) {
                    $loginState = TRUE;
                } else {
                    $loginState = FALSE;
                }

                if($loginState == TRUE){

                    if($_POST['new_passwd'] == $_POST['new_passwd_repeat']){

                        $cost = 10;
                        $hash = password_hash($_POST['new_passwd'], PASSWORD_BCRYPT, ['cost' => $cost]);

                        $SQL = $db->prepare("UPDATE `users` SET `password` = :password WHERE `id` = :id");
                        $SQL->execute(array(':password' => $hash, ':id' => $userid));

                        echo sendSuccess('Dein Passwort wurde geändert');

                    } else {
                        echo sendError('Die eingegebenen Passwörter stimmen nicht überein');
                    }

                } else {
                    echo sendError('Dein aktuelles Passwort stimmt nicht');
                }

            }
        }
    }
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

                <div class="col-md-4">
                    <div class="card">
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
                            <label>Personal Member Limit</label>
                            <input value="<?= $user_memberslots; ?>" readonly style="color: white;" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <label>Aktuelles Passwort</label>
                                <input name="old_passwd" class="form-control" type="password" required="required">
                                <br>
                                <label>Neues Passwort</label>
                                <input name="new_passwd" class="form-control" type="password" required="required">
                                <br>
                                <label>Neues Passwort wiederholen</label>
                                <input name="new_passwd_repeat" class="form-control" type="password" required="required">
                                <br>
                                <button type="submit" name="changePassword" class="btn btn-primary btn-block">Passwort ändern</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-muted">Login Logs</p>
                            <table id="table1" class="table dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>IP Adresse</th>
                                    <th>Datum</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $SQL = $db->prepare("SELECT * FROM `login_logs` WHERE `user_id` = :user_id ORDER BY `id` DESC LIMIT 10");
                                $SQL->execute(array(":user_id" => $userid));
                                if ($SQL->rowCount() != 0) {
                                    while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?= $row['ip_addr']; ?></td>
                                            <td><?= $helper->formatDate($row['created_at']); ?></td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>