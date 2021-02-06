<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

$user = new User();

class User extends Controller
{

    public function exists($data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `email` = :email OR `username` = :username");
        $SQL->execute(array(":email" => $data, ":username" => $data));
        if($SQL->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function getState($data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `email` = :email OR `username` = :username");
        $SQL->execute(array(":email" => $data, ":username" => $data));
        $data = $SQL->fetch(PDO::FETCH_ASSOC);

        return $data['state'];
    }

    public function verifyLogin($data, $password)
    {
        $SQL = self::db()->prepare('SELECT * FROM `users` WHERE `email` = :email OR `username` = :username');
        $SQL->execute(array(":email" => $data, ":username" => $data));
        $data = $SQL->fetch(PDO::FETCH_ASSOC);

        if(password_verify($password, $data['password'])) {
            return true;
        } else {
            return false;
        }
    }

    public function generateSessionToken($data, $session_token)
    {
        #$session_token = helper::generateRandomString(30);

        $SQL = self::db()->prepare("UPDATE `users` SET `session_token` = :session_token WHERE `email` = :email OR `username` = :username");
        $SQL->execute(array(":session_token" => $session_token, ":email" => $data, ":username" => $data));

        return $session_token;
    }

    public function create($username, $email, $password, $state = 'pending', $role = 'customer')
    {
        $cost = 10;
        $hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => $cost]);

        $db = self::db();
        $SQL = $db->prepare("INSERT INTO `users`(`username`, `email`, `password`, `state`, `role`) VALUES (?,?,?,?,?)");
        $SQL->execute(array($username, $email, $hash, $state, $role));
        return $db->lastInsertId();
    }

    public function loggedIn($session_token = null)
    {
        if(is_null($session_token)){
            return false;
        } else {
            return $this->sessionExists($session_token);
        }
    }

    public function sessionExists($session_token)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `session_token` = :session_token");
        $SQL->execute(array(":session_token" => $session_token));
        if($SQL->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function getDataBySession($session_token, $data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `session_token` = :session_token");
        $SQL->execute(array(":session_token" => $session_token));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response[$data];
    }

    public function getDataById($id, $data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `id` = :id");
        $SQL->execute(array(":id" => $id));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response[$data];
    }

    public function getDataByEmail($email, $data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `users` WHERE `email` = :email");
        $SQL->execute(array(":email" => $email));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response[$data];
    }

    public function isInTeam($session_token)
    {
        $role = User::getDataBySession($session_token,'role');

        if($role == 'admin'){
            return true;
        } else {
            return false;
        }
    }

    public function isAdmin($session_token)
    {
        $role = User::getDataBySession($session_token,'role');

        if($role == 'admin'){
            return true;
        } else {
            return false;
        }
    }

    public function memberCount()
    {
        $count = 0;

        $SQL = self::db()->prepare('SELECT * FROM `member` WHERE `deleted_at` IS NULL');
        $SQL->execute();
        $count = $count + $SQL->rowCount();

        return $count;
    }

    public function serviceCount($user_id)
    {
        $count = 0;

        $SQL = self::db()->prepare('SELECT * FROM `member` WHERE `user_id` = :user_id AND `deleted_at` IS NULL');
        $SQL->execute(array(":user_id" => $user_id));
        $count = $count + $SQL->rowCount();

        return $count;
    }

    public function getIP()
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe

                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }

}