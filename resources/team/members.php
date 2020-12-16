<?php
$currPage = 'back_Memberverwaltung_team_admin';
include 'app/controller/PageController.php';

// $productResult = $SQL = $db->prepare("SELECT * FROM `member`");

if (isset($_POST["exportcsv"])) {
    echo sendInfo('Derzeit nicht verfügbar!');

    // $filename = "Member-Export.csv";
    // header('Content-Type: text/csv; charset=utf-8');
    // header('Content-Disposition: attachment; filename="data.csv"');

    // $output = fopen("php://output", "w");
    // fputcsv($output, array('ID', 'Creator', 'Username', 'Reallife Name', 'Fortnite Name', 'Alter', 'Tracker', 'Team', 'Socials', 'Eigenschaften', 'Zukunftspläne', 'CWS'));
    // $queryResult = $SQL = $db->prepare("SELECT * FROM `member` ORDER BY ID DESC");
    // while($row = mysqli_fetch_assoc($queryResult))
    // {
    //     fputcsv($output, $row);
    // }
    // fclose($output);

    // $isPrintHeader = false;
    // if (!empty($productResult)) {
    //     foreach ($productResult as $row) {
    //         if (!$isPrintHeader) {
    //             echo implode("\t", array_keys($row)) . "\n";
    //             $isPrintHeader = true;
    //         }
    //         echo implode("\t", array_values($row)) . "\n";
    //     }
    // }
    // exit();
}

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <form method="post">
                        <button type="submit" name="exportcsv" class="btn btn-primary">Export to CSV</button>
                    </form>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= $helper->url(); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $currPageName; ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <script>
        function searchMembers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("membersearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("dataTableDE");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

    <style>
        #membersearch {
            background-position: 10px 12px;
            background-repeat: no-repeat;
            width: 100%;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Member</h3>
                        </div>
                        <div class="card-body">
                            <table id="dataTableDE" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Erstellt von</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Erstellt am</th>
                                        <th> </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <input type="text" id="membersearch" onkeyup="searchMembers()" placeholder="Search for Usernames.." class="form-control">
                                    <?php
                                    $SQL = $db->prepare("SELECT * FROM `member` WHERE `deleted_At` IS NULL ORDER BY `id` DESC");
                                    $SQL->execute();
                                    if ($SQL->rowCount() != 0) {
                                        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) {

                                            if (is_null($row['state'])) {
                                                $state = 'Gelöscht';
                                            } else {
                                                $state = 'Aktiv';
                                            }

                                    ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $user->getDataById($row['user_id'], 'username'); ?></td>
                                                <td><?= $helper->protect($row['username']); ?></td>
                                                <td><?= $state ?></td>
                                                <td><?= $helper->formatDate($row['created_at']); ?></td>
                                                <td> <a href="<?= $helper->url(); ?>team/member/<?= $row['id']; ?>"><button class="btn btn-primary btn-sm">Verwalten</button></a> </td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>