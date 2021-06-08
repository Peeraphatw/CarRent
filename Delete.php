<?php
$DID = $_REQUEST["DID"];
$DeletePath = $_REQUEST["DeletePath"];

$con = new mysqli("localhost", "root", "", "V_carental");

$query = "DELETE FROM v_carental_carmanager WHERE ID = '$DID'";
$result = $con->query($query);

if ($result) {

    $delete_res = @unlink("CarStore/" . $DeletePath);

    if ($delete_res) {
        header("Location:CarManager.php");
    }

}