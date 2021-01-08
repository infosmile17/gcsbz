<?php
include_once('database.php');


if (isset($_POST['enregistrer_modification']) && $_POST['enregistrer_modification'] != '') {
    $nomprenom = $_POST['nomprenom'];
    $id = $_POST['id_mod'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $remarques = $_POST['remarques'];
    $sql = "UPDATE `fournis` SET `nomprenom`='$nomprenom',`tel1`='$tel1',`tel2`='$tel2',`email`='$email',`adresse`='$adresse',`remarques`='$remarques' WHERE `id` = '{$id}' LIMIT 1";

    if ($con->query($sql) === TRUE) {
        $msg = "Nouveau fournisseur créé avec succès";
        header("location: fourni.php?msg=" . $msg);
    } else {
        header("location: 404.php");
    }
    var_dump($_POST);
}if (isset($_POST['enregistrer']) && $_POST['enregistrer'] != '') {

    $nomprenom = $_POST['nomprenom'];
    $tel1 = $_POST['tel1'];
    $tel2 = $_POST['tel2'];
    $email = $_POST['email'];
    $adresse = $_POST['adresse'];
    $remarques = $_POST['remarques'];


    $sql = "INSERT INTO fournis (nomprenom, tel1, tel2, email, adresse, remarques) VALUES ('$nomprenom', '$tel1', '$tel2', '$email', '$adresse', '$remarques')";
    if ($con->query($sql) === TRUE) {
        $msg = "Nouveau fournisseur créé avec succès";
        header("location: fourni.php?msg=" . $msg);
    } else {
        header("location: 404.php");
    }
    var_dump($_POST);
} elseif (isset($_GET['del'])) {
    if ($_GET['del'] != '') {
        $id = $_GET['del'];
        $sql = "DELETE FROM `fournis` WHERE `id` ='{$id}' LIMIT 1";
        if ($con->query($sql) === TRUE) {
            $msg = "Suppression d'un fournisseur avec succès";
            header("location: fourni.php?msg=" . $msg);
        } else {
            header("location: 404.php");
        }
    } else {
        $msg = 'Ereur de suppression';
        header("location: fourni.php?msg=" . $msg);
    }
} elseif (isset($_GET['mod'])) {
    if ($_GET['mod'] != '') {
        $id = $_GET['mod'];
        $sql = "select * FROM `fournis` WHERE `id` ='{$id}' LIMIT 1";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc() .
            header("location: fourni.php?msg=" . $msg);
        } else {
            header("location: 404.php");
        }
    } else {
        $msg = 'Ereur de suppression';
        header("location: fourni.php?msg=" . $msg);
    }
}
