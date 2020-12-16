<?php
$currPage = 'back_Teamverwaltung_team_admin';
include 'app/controller/PageController.php';

if (isset($_POST['createTeam'])) {
    $SQL = $db->prepare("INSERT INTO `member_teams`(`name`, `state`) VALUES (?,?)");
    $SQL->execute(array($_POST['name'], 'active'));

    echo sendSuccess('Das Team wurde angelegt');
}

?>
<form method="post">
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Neues Team erstellen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <label>Name:</label>
                    <input class="form-control" name="name" required="required">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Schließen</button>
                    <button type="submit" class="btn btn-primary" name="createTeam">Team erstellen</button>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Neues Team anlegen</button>
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
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Member Teams</div>
                        <div class="card-body">

                            <table id="dataTableDE" class="table table-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Erstellt am</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $SQL = $db->prepare("SELECT * FROM `member_teams`  WHERE `deleted_At` IS NULL");
                                    $SQL->execute();
                                    if ($SQL->rowCount() != 0) {
                                        while ($row = $SQL->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <tr>
                                                <td><?= $row['id']; ?></td>
                                                <td><?= $row['name']; ?></td>
                                                <td><?= $row['state']; ?></td>
                                                <td><?= $site->formatDate($row['created_at']); ?></td>
                                                <td><a href="<?= $helper->url(); ?>team/edit/<?= $row['id']; ?>" class="btn btn-primary btn-sm">Bearbeiten</a></td>
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