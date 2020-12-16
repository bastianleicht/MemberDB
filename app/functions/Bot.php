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

    public function delete($data, $node_id)
    {
        // Bot::stop($data, $data['id'], $node_id);

        sleep(1);

        $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
        $datetime = $date->format('Y-m-d H:i:s');

        $SQL = self::db()->prepare("UPDATE `bots` SET `state` = :state, `deleted_at` = :deleted_at WHERE `id` = :id");
        $SQL->execute(array(":state" => 'deleted', ":deleted_at" => $datetime, ":id" => $data['id']));
    }

    public function create($session_token, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws)
    {
        $user_id = User::getDataBySession($session_token, 'id');

        $SQL = self::db()->prepare("INSERT INTO `member` (`user_id`, `username` ,`rlname`,`fnname`,`member_alter`,`tracker`,`team_id`,`socials`, `eigenschaften`, `zukunft`, `cws`)  VALUES (?,?,?,?,?,?,?,?,?,?,?)");
        $SQL->execute(array($user_id, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws));

    }

}

?>