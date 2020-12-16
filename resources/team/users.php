<?php
$currPage = 'back_Team Benutzerübersicht_team_admin';
include 'app/controller/PageController.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

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

    <div class="content">
        <div class="container-fluid">

            <div class="card card-body">
            
                <table id="dataTableDE" class="table table-nowrap">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Benutzername</th>
                        <th scope="col">E-Mail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Rang</th>
                        <th scope="col">Kunde seit</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $SQL = $db -> prepare("SELECT * FROM `users` ORDER BY `id`");
                    $SQL->execute();
                    if ($SQL->rowCount() != 0) {
                        while ($row = $SQL -> fetch(PDO::FETCH_ASSOC)){ ?>
                            <tr>
                                <td><?= $row['id']; ?></td>
                                <td><?= $row['username']; ?></td>
                                <td><?= $row['email']; ?></td>
                                <td><?= $row['state']; ?></td>
                                <td><?= $row['role']; ?></td>
                                <td><?= $row['created_at']; ?></td>
                                <td><a href="<?php echo $url; ?>team/user/<?= $row['id']; ?>" class="btn btn-primary btn-sm">Anschauen</a></td>
                            </tr>
                        <?php } } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>