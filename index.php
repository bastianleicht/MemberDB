<?php
ob_start();
session_start();

$date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
$datetime = $date->format('Y-m-d H:i:s');

/*
 * composer
 */
include_once './vendor/autoload.php';

/*
 * config
 */
include 'app/controller/config.php';
include_once 'app/functions/autoload.php';

include_once 'app/notifications/sendMail.php';

/*
 * page manager
 */
$resources = 'resources/';
$sites = $resources.'sites/';
$auth = $resources.'auth/';
$customer = $resources.'customer/';
$team = $resources.'team/';

$page = $helper->protect($_GET['page']);

if(isset($_GET['page'])) {
    switch ($page) {

        default: include($sites."404.php");  break;

        //auth
        case "auth_login": include($auth."login.php");  break;
        case "auth_register": include($auth."register.php"); break;
        case "auth_logout": setcookie('session_token', null, time(),'/'); header('Location: '.$helper->url().'login'); break;
        case "auth_activate": include($auth."activate.php"); break;

        //index
        case "dashboard": include($customer."dashboard.php");  break;
        case "profile": include($customer."profile.php");  break;
        case "members": include($customer."members.php");  break;

        //member
        case "member": include($customer."member.php");  break;

        //rechtliches
        case "impressum": include($sites."impressum.php");  break;
        case "datenschutz": include($sites."datenschutz.php");  break;
        case "agb": include($sites."agb.php");  break;

        //team
        case "team_teams": include($team."teams.php");  break;
        case "team_edit": include($team."edit.php");  break;
        case "team_users": include($team."users.php");  break;
        case "team_user": include($team."user.php");  break;
        case "team_members": include($team."members.php");  break;
        case "team_member": include($team."member.php");  break;
        case "team_login_back": include($team."login_back.php");  break;
        case "team_settings": include($team."settings.php");  break;

    }

    include 'resources/additional/footer.php';
} else {
    die('Please enable .htaccess on your server');
}