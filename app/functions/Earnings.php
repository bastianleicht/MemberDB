<?php

$earnings = new Earnings();

class Earnings extends Controller
{

    public function create($member_id, $gateway, $state, $amount, $description)
    {
        $SQL = self::db()->prepare("INSERT INTO `earnings` (`member_id`, `gateway` ,`state`,`amount`,`description`)  VALUES (?,?,?,?,?)");
        $SQL->execute(array($member_id, $gateway, $state, $amount, $description));

    }

}

?>