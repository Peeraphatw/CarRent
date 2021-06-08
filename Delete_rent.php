<?php
$DID = $_REQUEST["DID"];
$DeletePath = $_REQUEST["DeletePath"];

$con = new mysqli("localhost", "root", "", "V_carental");

$query1 = "SELECT PathPersonnumber,PathDriver,Biling FROM v_carental_reservation WHERE ID = '$DID'";
$result1 = $con->query($query1);

if ($result1->num_rows != 0) {
    $data = $result1->fetch_assoc();
    @unlink("DriverId/" . $data["PathDriver"]);
    @unlink("BilingPic/" . $data["Biling"]);
    @unlink("PersonId/" . $data["PathPersonnumber"]);

    $query = "DELETE FROM v_carental_reservation WHERE ID = '$DID'";
    $result = $con->query($query);

    if ($result) {

        header("Location:Admin.php");

    }
}