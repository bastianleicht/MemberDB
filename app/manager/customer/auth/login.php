<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

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
        $SQL = $db->prepare("UPDATE `users` SET `user_addr` = :user_addr WHERE `email` = :email");
        $SQL->execute(array(":user_addr" => $user->getIP(), ":email" => $_POST['email']));

        $userid = $user->getDataByEmail($_POST['email'],'id');

        $SQL = $db->prepare("INSERT INTO `login_logs`(`user_id`, `ip_addr`) VALUES (?,?)");
        $SQL->execute(array($userid, $user->getIP()));


        $sessionId = $user->generateSessionToken($_POST['email'], $helper->generateRandomString(30));
        setcookie('session_token', $sessionId,time()+'864000','/');
        echo sendSuccess('Login erfolgreich. Du wirst gleich weitergeleitet');
        header('refresh:3;url='.$helper->url().'dashboard');

    } else {
        echo sendError($error);
    }
}