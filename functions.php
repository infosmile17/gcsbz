<?php
function getNameModel($id,$con)
{
    $sql = "select nom FROM `model` WHERE `id` ='{$id}' LIMIT 1";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['nom'];
      }else{
        return ' ';
      }
}

?>
