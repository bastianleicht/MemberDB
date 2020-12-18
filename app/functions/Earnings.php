<?php

$earnings = new Earnings();

class Earnings extends Controller
{

    public function create($member_id, $gateway, $state, $amount, $description)
    {
        $SQL = self::db()->prepare("INSERT INTO `earnings` (`member_id`, `gateway` ,`state`,`amount`,`description`)  VALUES (?,?,?,?,?)");
        $SQL->execute(array($member_id, $gateway, $state, $amount, $description));

    }

    public function getEarnings($userid)
    {
        $amount = 0;

        $SQL = self::db()->prepare("SELECT * FROM `earnings` WHERE `state` = 'success' AND `member_id` = :memberid");
        $SQL->execute(array(":memberid" => $userid));
        if ($SQL->rowCount() != 0) {
            while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {
                $amount = $amount + $row['amount'];
            }
        }

        return number_format($amount,2);
    }

}

?>