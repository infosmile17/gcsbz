<?php include_once('header.php'); ?>
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
                                    <h5>Listes des commandes</h5>
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
                                                        <th>Articles</th>
                                                        <th>Fournisseurs</th>
                                                        <th>Quantité</th>
                                                        <th>Prix achat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $sql = "SELECT * FROM commande_fournis";
                                                    $result = $con->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr><td scope='row'>" . $row["id"] . "</td><td>" . $row["id_article"] . "</td><td>" . $row["id_fournis"] . "</td><td>" . $row["qte"] . "</td><td>" . $row["prix_achat"] . "</td><td>" . $row["date"] . "</td>";
                                                            echo "<td><a href='commandes.php?mod=" . $row["id"] . "'>modifier</a> | <a href='apiCmdeFournis.php?del=" . $row["id"] . "'>Supprimer</a></td></tr>";
                                                        }
                                                    } else {
                                                        echo "0 resultats";
                                                    }
                                                    
                                                    ?>
                                                </tbody>
                                            </table>
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
                                                                            <h3>Entrer en stocks</h3>
                                                                            <div>
                                                                            <form action="apiCmdeFournis.php" method="POST">
                                                                                
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">Articles</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select name="id_article">
                                                                                            <?php
                                                                                            $sql22 = "select id,reference,titre FROM `articles`";
                                                                                            $result22 = $con->query($sql22);
                                                                                            if ($result22->num_rows > 0) {
                                                                                                while ($row22 = $result22->fetch_assoc()) {
                                                                                                    echo "<option value='" . $row22['id'] . "'>" . $row22["reference"] . " : " . $row22["titre"] . "</option>";
                                                                                                }
                                                                                            }
                                                                                            //$con->close();
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">Fournisseurs</label>
                                                                                    <div class="col-sm-9">
                                                                                        <select name="id_fournis">
                                                                                            <?php
                                                                                            $sql22 = "select id,nomprenom FROM `fournis`";
                                                                                            $result22 = $con->query($sql22);
                                                                                            if ($result22->num_rows > 0) {
                                                                                                while ($row22 = $result22->fetch_assoc()) {
                                                                                                    echo "<option value='" . $row22['id'] . "'>" . $row22["nomprenom"] . "</option>";
                                                                                                }
                                                                                            }
                                                                                            $con->close();
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label"><b>Quantité</b></label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="text" class="form-control form-control-round" name="qte">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <label class="col-sm-3 col-form-label">Prix achat</label>
                                                                                    <div class="col-sm-9">
                                                                                        <input type="number" class="form-control form-control-round" name="prix_achat">
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