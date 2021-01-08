<?php
include_once('database.php');


if (isset($_POST['enregistrer_modification']) && $_POST['enregistrer_modification'] != '') {
    $id = $_POST['id_mod'];
    $reference = $_POST['reference'];
    $titre = $_POST['titre'];
    $qte_min = $_POST['qte_min'];
    $id_model = $_POST['id_model'];
    $description = $_POST['description'];

    $sql = "UPDATE `articles` SET `reference`='$reference',`titre`='$titre',`qte_min`='$qte_min',`id_model`='$id_model',`description`='$description' WHERE `id` = '{$id}' LIMIT 1";

    if ($con->query($sql) === TRUE) {
        $msg = "un article modifié avec succès";
        header("location: articles.php?msg=" . $msg);
    } else {
        header("location: 404.php");
    }
    var_dump($_POST);
}if (isset($_POST['enregistrer']) && $_POST['enregistrer'] != '') {

   
    $reference = $_POST['reference'];
    $titre = $_POST['titre'];
    $qte_min = $_POST['qte_min'];
    $id_model = $_POST['id_model'];
    $description = $_POST['description'];

    $sql = "INSERT INTO articles (reference, titre, qte_min, id_model, description) VALUES ('$reference', '$titre', '$qte_min', '$id_model', '$description')";



    if ($con->query($sql) === TRUE) {
        $msg = "Nouveau article créé avec succès";
        header("location: articles.php?msg=" . $msg);
    } else {
        header("location: 404.php");
    }
    var_dump($_POST);
} elseif (isset($_GET['del'])) {
    if ($_GET['del'] != '') {
        $id = $_GET['del'];
        $sql = "DELETE FROM `articles` WHERE `id` ='{$id}' LIMIT 1";
        if ($con->query($sql) === TRUE) {
            $msg = "Suppression d'un article avec succès";
            header("location: articles.php?msg=" . $msg);
        } else {
            header("location: 404.php");
        }
    } else {
        $msg = 'Ereur de suppression';
        header("location: articles.php?msg=" . $msg);
    }
} elseif (isset($_GET['mod'])) {
    if ($_GET['mod'] != '') {
        $id = $_GET['mod'];
        $sql = "select * FROM `articles` WHERE `id` ='{$id}' LIMIT 1";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc() .
            header("location: articles.php?msg=" . $msg);
        } else {
            header("location: 404.php");
        }
    } else {
        $msg = 'Ereur de suppression';
        header("location: articles.php?msg=" . $msg);
    }
}
