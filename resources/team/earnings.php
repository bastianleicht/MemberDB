<?php
/*
 *   Copyright (c) 2021 Bastian Leicht
 *   All rights reserved.
 *   https://github.com/routerabfrage/License
 */

$currPage = 'back_Team Earnings_team_admin';
include 'app/controller/PageController.php';

$text = 'Bitte auswählen...';
if(isset($_POST['all'])){
    $amount = 0;

    $SQL = $db->prepare("SELECT * FROM `earnings` WHERE `state` = 'success'");
    $SQL->execute();
    if ($SQL->rowCount() != 0) {
        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {
            $amount = $amount + $row['amount'];
        }
    }

    $text = 'Die Gesammteinnahmen betragen '.number_format($amount,2).'€';
}

if(isset($_POST['year'])){
    $amount = 0;

    $dateMinus = new DateTime(null, new DateTimeZone('Europe/Berlin'));
    $dateMinus->modify('-365 day');
    $dateTimeMinus = $dateMinus->format('Y-m-d H:i:s');

    $SQL = $db->prepare("SELECT * FROM `earnings` WHERE `state` = 'success' AND `created_at` > :dateTimeMinus");
    $SQL->execute(array(":dateTimeMinus" => $dateTimeMinus));
    if ($SQL->rowCount() != 0) {
        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {
            $amount = $amount + $row['amount'];
        }
    }

    $text = 'Die Einnahmen von den letzten 365 Tagen betragen '.number_format($amount,2).'€';
}

if(isset($_POST['month'])){
    $amount = 0;

    $dateMinus = new DateTime(null, new DateTimeZone('Europe/Berlin'));
    $dateMinus->modify('-30 day');
    $dateTimeMinus = $dateMinus->format('Y-m-d H:i:s');

    $SQL = $db->prepare("SELECT * FROM `earnings` WHERE `state` = 'success' AND `created_at` > :dateTimeMinus");
    $SQL->execute(array(":dateTimeMinus" => $dateTimeMinus));
    if ($SQL->rowCount() != 0) {
        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {
            $amount = $amount + $row['amount'];
        }
    }

    $text = 'Die Einnahmen von den letzten 30 Tagen betragen '.number_format($amount,2).'€';
}

if(isset($_POST['day'])){
    $amount = 0;

    $dateMinus = new DateTime(null, new DateTimeZone('Europe/Berlin'));
    $dateMinus->modify('-1 day');
    $dateTimeMinus = $dateMinus->format('Y-m-d H:i:s');

    $SQL = $db->prepare("SELECT * FROM `earnings` WHERE `state` = 'success' AND `created_at` > :dateTimeMinus");
    $SQL->execute(array(":dateTimeMinus" => $dateTimeMinus));
    if ($SQL->rowCount() != 0) {
        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {
            $amount = $amount + $row['amount'];
        }
    }

    $text = 'Die Einnahmen von den letzten 24 Stunden betragen '.number_format($amount,2).'€';
}

if(isset($_POST['addEarnings'])){

    $error = null;

    if (empty($_POST['member'])) {
        $error = 'Bitte wähle ein Member aus!';
    }

    if (empty($_POST['state'])) {
        $error = 'Bitte wähle einen Status aus!';
    }

    if (empty($_POST['gateway'])) {
        $error = 'Bitte wähle einen Gateway aus!';
    }

    if (empty($_POST['amount'])) {
        $error = 'Bitte füge eine Amount hinzu!';
    }

    if (empty($_POST['description'])) {
        $error = 'Bitte füge eine Description hinzu!';
    }

    #if ($earning_slots <= $user->earningCount()) {
    #    $error = 'Das Member Limit wurde erreicht';
    #}

    if (empty($error)) {

        $earnings->create($member->getIDbyUName($_POST['member']), $_POST['gateway'], $_POST['state'], $_POST['amount'], $_POST['description']);

        echo sendSuccess('Earning wurde erstellt');
    } else {
        echo sendError($error);
    }

}


?>

<form method="post">
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="max-width: 800px; margin: 1.75rem auto;">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Earnings Hinzufügen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Member:</label>

                    <input type="text" name="member" list="laender" class="form-control" required>
                    <datalist id="laender">
                        <?php
                        $SQL = $db->prepare("SELECT * FROM `member` WHERE `state` = 'active'");
                        $SQL->execute();
                        if ($SQL->rowCount() != 0) {
                            while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) { ?>
                                <option value="<?= $row['username']; ?>"><?= $row['id']; ?></option>
                            <?php }
                        } ?>
                    </datalist>
                    </input>

                    <br>
                    <label>State:</label>
                    <select class="form-control" name="state" required>
                        <option value="success">Erfolgreich</option>
                        <option value="pending">Ausstehend</option>
                        <option value="abort">Abgebrochen</option>
                    </select>

                    <br>
                    <label>Gateway:</label>
                    <input name="gateway" placeholder="PayPal, Paysavecard etc." class="form-control" required>

                    <br>
                    <label>Amount:</label>
                    <input name="amount" placeholder="10€" class="form-control" required>

                    <br>
                    <label>Bemerkungen:</label>
                    <textarea class="form-control" rows="5" name="description" placeholder="-" required></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" name="addEarnings">Himzufügen</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="<?= $helper->url(); ?>"><?= $helper->siteName(); ?></a></li>
                        <li class="breadcrumb-item active"><?= $currPageName; ?></li>
                    </ol>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-sm-right" data-toggle="modal" data-target="#exampleModal">Earnings hinzufügen</button>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex flex-column">

                            <form method="post">
                                <input value="all" name="type" hidden>
                                <button type="submit" name="all" class="btn btn-primary btn-block">Gesammt</button>
                            </form>

                            <br>

                            <form method="post">
                                <input value="year" name="type" hidden>
                                <button type="submit" name="year" class="btn btn-primary btn-block">1 Jahr</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex flex-column">
                            <form method="post">
                                <input value="month" name="type" hidden>
                                <button type="submit" name="month" class="btn btn-primary btn-block">Monat</button>
                            </form>

                            <br>

                            <form method="post">
                                <input value="day" name="type" hidden>
                                <button type="submit" name="day" class="btn btn-primary btn-block">Tag</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <br>
                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex flex-column">
                            <?= $text; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">

                    <br>

                    <div class="card card-custom card-stretch gutter-b">
                        <div class="card-body d-flex flex-column">
                            <table id="table1" class="table dt-responsive nowrap">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Gateway</th>
                                    <th>State</th>
                                    <th>Betrag</th>
                                    <th>Beschreibung</th>
                                    <th>Datum</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $SQL = $db->prepare("SELECT * FROM `earnings` WHERE `state` = 'success' ORDER BY `id` DESC LIMIT 15");
                                $SQL->execute();
                                if ($SQL->rowCount() != 0) {
                                    while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){?>
                                        <tr>
                                            <td><?= $row['id']; ?></td>
                                            <td><?= $member->getData($row['member_id'], 'username'); ?></td>
                                            <td><?= $row['gateway']; ?></td>
                                            <td><?= $row['state']?></td>
                                            <td><?= $row['amount']; ?>€</td>
                                            <td><?= $row['description']; ?></td>
                                            <td><?= $helper->formatDate($row['created_at']); ?></td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
