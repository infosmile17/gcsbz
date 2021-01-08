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

    $id_article = $_POST['id_article'];
    $id_fournis = $_POST['id_fournis'];
    $qte = $_POST['qte'];
    $prix_achat = $_POST['prix_achat'];
    $sql = "INSERT INTO commande_fournis (id_article, id_fournis, qte, prix_achat) VALUES ('$id_article', '$id_fournis', '$qte', '$prix_achat')";

    if ($con->query($sql) === TRUE) {
        $msg = "Mise à jour du stock";



        header("location: commandes.php?msg=" . $msg);
    } else {
        header("location: 404.php");
    }
    var_dump($_POST);
} elseif (isset($_GET['del'])) {
    if ($_GET['del'] != '') {
        $id = $_GET['del'];
        $sql = "DELETE FROM `commande_fournis` WHERE `id` ='{$id}' LIMIT 1";
        if ($con->query($sql) === TRUE) {
            $msg = "Mise à jour du stock";
            header("location: commandes.php?msg=" . $msg);
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
