<?php
session_start();
$con = new mysqli("localhost", "root", "", "V_carental");

$Brand = $_REQUEST["Brand"];
$Model = $_REQUEST["Model"];
$Year = $_REQUEST["Year"];
$Seat = $_REQUEST["Seat"];
$Price = $_REQUEST["Price"];
$Carupload = $_FILES["fileupload"];
$Type = $_REQUEST["Type"];
$CarSequence = uniqid("CA_");
if ($Carupload != "") {
    $path = "CarStore/";
    $type = strrchr($_FILES['fileupload']['name'], ".");
    $newname = $CarSequence . $type;
    $path_copy = $path . $newname;
    $path_link = "fileupload/" . $newname;
    $resultMove = move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
}
if ($resultMove) {
    $query = "INSERT INTO v_carental_carmanager (CarSequence, Brand, Model,Year,Seat,Price,Path,Carstatus,Type)
    VALUES ('$CarSequence', '$Brand', '$Model','$Year','$Seat','$Price','$newname','Available','$Type')";
}
$result = $con->query($query);

if ($result) {
    header("Location:CarManager.php");
} else {
    echo mysqli_error($con);
}