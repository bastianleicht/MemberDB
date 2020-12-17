<?php

$bot = new Bot();

class Bot extends Controller
{

    public function getSelfCount($session_token)
    {
        $user_id = User::getDataBySession($session_token,'id');

        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `user_id` = :user_id AND `deleted_at` IS NULL");
        $SQL->execute(array(":user_id" => $user_id));
        $count = $SQL->rowCount();

        return $count;
    }

    public function getCreated()
    {
        $SQL = self::db()->prepare("SELECT * FROM `member`");
        $SQL->execute();
        $count = $SQL->rowCount();

        return $count;
    }

    public function getCount()
    {
        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `deleted_at` IS NULL");
        $SQL->execute();
        $count = $SQL->rowCount();

        return $count;
    }

    public function getData($bot_id, $data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `id` = :id");
        $SQL->execute(array(":id" => $bot_id));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response[$data];
    }

    public function create($userid, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws, $bemerkungen)
    {
        $SQL = self::db()->prepare("INSERT INTO `member` (`user_id`, `username` ,`rlname`,`fnname`,`member_alter`,`tracker`,`team_id`,`socials`, `eigenschaften`, `zukunft`, `cws`, `bemerkungen`)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $SQL->execute(array($userid, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws, $bemerkungen));

    }

}

?>