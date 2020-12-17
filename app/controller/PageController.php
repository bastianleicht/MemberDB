<?php

if($user->sessionExists($_COOKIE['session_token'])){
    /*
     * static values
     */

    $username = $user->getDataBySession($_COOKIE['session_token'],'username');
    $mail = $user->getDataBySession($_COOKIE['session_token'],'email');
    $userid = $user->getDataBySession($_COOKIE['session_token'],'id');
    $user_memberslots = $user->getDataBySession($_COOKIE['session_token'],'member_limit');
    $member_slots = $helper->getSetting('memberLimit');

    $user_addr = $user->getDataBySession($_COOKIE['session_token'],'user_addr');
    if(is_null($user_addr)){
        $SQL = $db->prepare("UPDATE `users` SET `user_addr` = :user_addr WHERE `id` = :id");
        $SQL->execute(array(":user_addr" => $user->getIP(), ":id" => $userid));
        $user_addr = $user->getIP();
    }
    include_once 'app/controller/config.php';
    if($dev = true){
        if('127.0.0.1' != $user_addr){
            if(isset($_COOKIE['old_session_token'])){
                if($user->isInTeam($_COOKIE['old_session_token'])){

                } else {
                    $_SESSION['info_msg'] = 'Session Expired';
                    setcookie('session_token', null, time(), '/'); header('Location: '.$helper->url().'login');
                    die();
                }
            } else {
                $_SESSION['info_msg'] = 'Session Expired';
                setcookie('session_token', null, time(), '/'); header('Location: '.$helper->url().'login');
                die();
            }
        }
    } else {
        if($user->getIP() != $user_addr){
            if(isset($_COOKIE['old_session_token'])){
                if($user->isInTeam($_COOKIE['old_session_token'])){

                } else {
                    $_SESSION['info_msg'] = 'Session Expired';
                    setcookie('session_token', null, time(), '/'); header('Location: '.$helper->url().'login');
                    die();
                }
            } else {
                $_SESSION['info_msg'] = 'Session Expired weirdly';
                setcookie('session_token', null, time(), '/'); header('Location: '.$helper->url().'login');
                die();
            }
        }
    }

}

if (strpos($currPage,'back_') !== false || strpos($currPage,'_team') !== false) {

    /*
     * check if user is logged in
     */
    if(!($user->loggedIn($_COOKIE['session_token']))){
        die(header('Location: '.$helper->url().'login'));
    }

    /*
     * check if user is on team page and is in team
     */
    if(strpos($currPage,'_team') !== false) {
        if (!$user->isInTeam($_COOKIE['session_token'])) {
            die(header('Location: ' . $url . 'dashboard'));
        }
    }

    /*
     * check if user is on admin page and is admin
     */
    if(strpos($currPage,'_admin') !== false) {
        if (!$user->isAdmin($_COOKIE['session_token'])) {
            die(header('Location: ' . $url . 'dashboard'));
        }
    }

}

$currPageName = explode('_',$currPage)[1];
if (strpos($currPage,'auth_') !== false) {
    include 'resources/additional/head.php';
}
if (strpos($currPage,'back_') !== false) {
    include 'resources/additional/head.php';
    include 'resources/additional/navbar.php';
}

if (strpos($currPage,'front_') !== false) {
    include 'resources/additional/head.php';
}

include 'app/notifications/sendAlert.php';

/*
 * manage cookies
 */
if(isset($_SESSION['error_msg']) && !empty($_SESSION['error_msg'])){
    echo sendError($_SESSION['error_msg']);
    $_SESSION['error_msg'] = '';
    unset($_SESSION['error_msg']);
}

if(isset($_SESSION['info_msg']) && !empty($_SESSION['info_msg'])){
    echo sendInfo($_SESSION['info_msg']);
    $_SESSION['info_msg'] = '';
    unset($_SESSION['info_msg']);
}

if(isset($_SESSION['success_msg']) && !empty($_SESSION['success_msg'])){
    echo sendSuccess($_SESSION['success_msg']);
    $_SESSION['success_msg'] = '';
    unset($_SESSION['success_msg']);
}