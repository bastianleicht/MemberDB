<?php

$member = new Member();

class Member extends Controller
{
    public function getData($member_id, $data)
    {
        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `id` = :id");
        $SQL->execute(array(":id" => $member_id));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response[$data];
    }

    public function getIDbyUName($username)
    {
        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `username` = :username");
        $SQL->execute(array(":username" => $username));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response['id'];
    }

    public function getTeambyID($id)
    {
        $SQL = self::db()->prepare("SELECT * FROM `member_teams` WHERE `id` = :id");
        $SQL->execute(array(":id" => $id));
        $response = $SQL->fetch(PDO::FETCH_ASSOC);

        return $response['name'];
    }

    public function create($userid, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws, $bemerkungen)
    {
        $SQL = self::db()->prepare("INSERT INTO `member` (`user_id`, `username` ,`rlname`,`fnname`,`member_alter`,`tracker`,`team_id`,`socials`, `eigenschaften`, `zukunft`, `cws`, `bemerkungen`)  VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $SQL->execute(array($userid, $username, $rlname, $fnname, $alter, $trackerlink, $team, $socials, $eigenschaften, $zukunft, $cws, $bemerkungen));

    }

    public function exists($username)
    {
        $SQL = self::db()->prepare("SELECT * FROM `member` WHERE `username` = :username");
        $SQL->execute(array(":username" => $username));
        if($SQL->rowCount() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function allMemberCount()
    {
        $count = 0;

        $SQL = self::db()->prepare('SELECT * FROM `member` WHERE `state` = "active" AND `deleted_at` IS NULL');
        $SQL->execute();
        $count = $count + $SQL->rowCount();

        return $count;
    }

}

?>