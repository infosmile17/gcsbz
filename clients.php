<?php
include_once('header.php');
?>
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <?php include_once('navbar.php'); ?>
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- Main-body start -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- Page-body start -->
                        <div class="page-body">
                            <!-- Basic table card start -->
                            <div class="card">
                                <div class="card-header">

                                    <?php
                                    
                                    if (isset($_GET['mod'])) {
                                        if ($_GET['mod'] != '') {
                                            $id = $_GET['mod'];
                                            $sql = "select * FROM `clients` WHERE `id` ='{$id}' LIMIT 1";
                                            $result = $con->query($sql);
                                            if ($result->num_rows > 0) {
                                                $row = $result->fetch_assoc();
                                                ?>
                                                <br>
                                                <br>
                                                   <div>
                                                                            <form action="apiClients.php" method="POST">
                                                                            <input type="hidden" name="id_mod" value="<?php echo $row['id']; ?>" />
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label"><b>Nom et Prénom</b></label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="nomprenom" value="<?php echo $row['nomprenom']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">Téléphone 1</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="tel1" value="<?php echo $row['tel1']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Téléphone 2</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="tel2" value="<?php echo $row['tel2']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Email</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="email" value="<?php echo $row['email']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Adresse</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="adresse" value="<?php echo $row['adresse']; ?>">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label text-muted">Remarque</label>
                                                                                    <div class="col-sm-10">
                                                                                        <textarea rows="5" cols="5" class="form-control" name="remarques"><?php echo $row['remarques']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-primary waves-effect md-close" type="submit" value="enregistrer_modification" name="enregistrer_modification">Enregistrer modification</button>
                                                                                <button class="btn btn-primary waves-effect md-close" type="reset" value="vider">Vider</button>

                                                                            </form>
                                                                        </div>
                                                <?php
                                            } else {
                                                header("location: 404.php");
                                            }
                                        }
                                    }

                                    ?>
<br>
<h5>Listes des clients</h5>
                                    <!-- button Default -->
                                    <button type="button" class="btn btn-success btn-outline-success waves-effect md-trigger" data-modal="modal-9">nouveau</button>

                                    <div class="card-block">

                                        <div class="card-header-right">
                                            <ul class="list-unstyled card-option">
                                                <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                                <li><i class="fa fa-window-maximize full-card"></i></li>
                                                <li><i class="fa fa-minus minimize-card"></i></li>
                                                <li><i class="fa fa-refresh reload-card"></i></li>
                                                <li><i class="fa fa-trash close-card"></i></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-block table-border-style">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nom et Prénom</th>
                                                        <th>Téléphone 1</th>
                                                        <th>Téléphone 2</th>
                                                        <th>Email</th>
                                                        <th>Opérations</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $sql = "SELECT * FROM clients";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr><td scope='row'>" . $row["id"] . "</td><td>" . $row["nomprenom"] . "</td><td>" . $row["tel1"] . "</td><td>" . $row["tel2"] . "</td><td>" . $row["email"] . "</td>";
                                                            echo "<td><a href='clients.php?mod=" . $row["id"] . "'>modifier</a> | <a href='apiClients.php?del=" . $row["id"] . "'>Supprimer</a></td></tr>";
                                                        }
                                                    } else {
                                                        echo "0 resultats";
                                                    }
                                                    $con->close();
                                                    ?>
                                                </tbody>
                                            </table>
                                            <!--
                                            <div class="card-header">
                                                <div>
                                                    <button class="btn waves-effect waves-dark btn-primary btn-outline-primary btn-icon"><i class="icofont icofont-user-alt-3"></i></button>
                                                    <button class="btn waves-effect waves-dark btn-success btn-outline-success btn-icon"><i class="icofont icofont-check-circled"></i></button>
                                                    <button class="btn waves-effect waves-dark btn-info btn-outline-info btn-icon"><i class="icofont icofont-info-square"></i></button>
                                                    <button class="btn waves-effect waves-dark btn-warning btn-outline-warning btn-icon"><i class="icofont icofont-warning-alt"></i></button>
                                                    <button class="btn waves-effect waves-dark btn-danger btn-outline-danger btn-icon"><i class="icofont icofont-eye-alt"></i></button>
                                                    <button class="btn waves-effect waves-dark btn-inverse btn-outline-inverse btn-icon"><i class="icofont icofont-exchange"></i></button>
                                                </div>
                                            </div>
                                                -->
                                        </div>
                                    </div>
                                  
                                </div>
                            </div>
                            <!-- Basic table card end -->
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <!-- Page body start -->
                                        <div class="page-body button-page">
                                            <div class="row">
                                                <!-- Animation modal start / Nifty Modal Window Effects start-->
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-block">
                                                            <div class="animation-model">
                                                                <!-- animation modal Dialogs start -->
                                                                <div class="md-modal md-effect-9" id="modal-9">
                                                                    <div class="md-content">
                                                                        <h3>Nouveau client</h3>
                                                                        <div>
                                                                            <form action="apiClients.php" method="POST">
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label"><b>Nom et Prénom</b></label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="nomprenom">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">Téléphone 1</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="tel1">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Téléphone 2</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="tel2">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Email</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label text-muted">Adresse</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="adresse">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-2 col-form-label text-muted">Remarque</label>
                                                                                    <div class="col-sm-10">
                                                                                        <textarea rows="5" cols="5" class="form-control" name="remarques"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-primary waves-effect md-close" type="submit" value="enregistrer" name="enregistrer">Enregistrer</button>
                                                                                <button class="btn btn-primary waves-effect md-close" type="reset" value="vider">Vider</button>

                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--animation modal  Dialogs ends -->
                                                                <div class="md-overlay"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Page-body end -->
                                        </div>
                                    </div>
                                    <!-- Main-body end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Required Jquery -->
        <?php include_once('footer.php'); ?>