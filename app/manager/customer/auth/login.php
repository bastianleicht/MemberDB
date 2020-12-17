<?php
if(isset($_POST['login'])){
    $error = null;

    if(empty($_POST['email'])){
        $error = 'Bitte gebe eine E-Mail an';
    }

    if(empty($_POST['password'])){
        $error = 'Bitte gebe ein Passwort an';
    }

    if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) == false){
        $error = 'Bitte gebe eine gültige E-Mail an';
    }

    if(!$user->verifyLogin($_POST['email'], $_POST['password'])){
        $error = 'Das angegebene Passwort stimmt nicht';
    }

    if($helper->getSetting('login') == 0){
        $error = 'Der Login ist derzeit deaktiviert';
    }

    if($user->getState($_POST['email']) == 'pending'){
        $error = 'Bitte warte bis ein Admin deinen Account bestätigt!';
    }

    if(empty($error)){
        include_once 'app/controller/config.php';
        if($dev = true){
            $SQL = $db->prepare("UPDATE `users` SET `user_addr` = :user_addr WHERE `email` = :email");
            $SQL->execute(array(":user_addr" => '127.0.0.1', ":email" => $_POST['email']));

            $userid = $user->getDataByEmail($_POST['email'],'id');

            $SQL = $db->prepare("INSERT INTO `login_logs`(`user_id`, `ip_addr`) VALUES (?,?)");
            $SQL->execute(array($userid, '127.0.0.1'));
        } else {
            $SQL = $db->prepare("UPDATE `users` SET `user_addr` = :user_addr WHERE `email` = :email");
            $SQL->execute(array(":user_addr" => $user->getIP(), ":email" => $_POST['email']));

            $userid = $user->getDataByEmail($_POST['email'],'id');

            $SQL = $db->prepare("INSERT INTO `login_logs`(`user_id`, `ip_addr`) VALUES (?,?)");
            $SQL->execute(array($userid, $user->getIP()));
        }


        $sessionId = $user->generateSessionToken($_POST['email'], $helper->generateRandomString(30));
        setcookie('session_token', $sessionId,time()+'864000','/');
        echo sendSuccess('Login erfolgreich. Du wirst gleich weitergeleitet');
        header('refresh:3;url='.$helper->url().'dashboard');

    } else {
        echo sendError($error);
    }
}