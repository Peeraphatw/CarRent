<?php
$ID = $_REQUEST['MID'];
$RentStatus = $_REQUEST["RentStatus"];
$CarPicking = $_REQUEST["CarPicking"];
if ($_REQUEST["Actual_Return"] != "") {
    $Actual_Return = date_format(date_create($_REQUEST["Actual_Return"]), 'd-m-Y H:i');
} else {
    $Actual_Return = "";
}

$con = new mysqli("localhost", "root", "", "V_carental");
$query = "UPDATE v_carental_reservation SET RentStatus = '$RentStatus',Actual_Return = '$Actual_Return' WHERE ID = $ID";

if ($con->query($query)) {
    if ($RentStatus == "Confirmed") {
        $query2 = "UPDATE  v_carental_carmanager SET Carstatus = 'On Rent' WHERE CarSequence = '$CarPicking'";
    } else if ($RentStatus == "Padding") {
        $query2 = "UPDATE  v_carental_carmanager SET Carstatus = 'Picking' WHERE CarSequence = '$CarPicking'";
    } else if ($RentStatus == "Returned") {
        $query2 = "UPDATE  v_carental_carmanager SET Carstatus = 'Available' WHERE CarSequence = '$CarPicking'";
    }
    if ($con->query($query2)) {

        header("Location:Admin.php");
    } else {
        echo mysqli_error($con);
    }

} else {
    echo mysqli_error($con);
}