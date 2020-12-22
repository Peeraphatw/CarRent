<?php

$ID = $_REQUEST["MID"];
$Brand = $_REQUEST["Brand"];
$Model = $_REQUEST["Model"];
$Year = $_REQUEST["Year"];
$Seat = $_REQUEST["Seat"];
$Carstatus = $_REQUEST["Carstatus"];
$Carupload= $_FILES["fileupload"];
$Type = $_REQUEST["Type"];
$con = new mysqli("localhost","root","","V_carental");

$query = "UPDATE v_carental_carmanager 
SET Brand ='$Brand', Model = '$Model',
Year = '$Year', Seat = '$Seat',
Carstatus = '$Carstatus',Type = '$Type' WHERE ID = '$ID' ";
$result = $con->query($query);

if($result)
{
    if($_FILES['fileupload']['name'] <>"")
    {
        $query2 = "SELECT Path FROM v_carental_carmanager WHERE ID = '$ID'";
        $result2 = $con->query($query2);
        $data = $result2->fetch_assoc();
        
        $deletePath = "Carstore/".$data["Path"];

        $delete_res = @unlink($deletePath);

        if($delete_res)
        {          
                $path = "CarStore/";
                //$type = strrchr($_FILES['fileupload']['name'],".");
                $path_copy=$path.$data["Path"];
                $path_link="fileupload/".$data["Path"];
                $resultMove = move_uploaded_file($_FILES['fileupload']['tmp_name'],$path_copy);
                if($resultMove)
                {      
                        header("Location:CarManager.php");
                }       
        }   
    }
    else
    {
        header("Location:CarManager.php");
    }
}
else
{
    echo mysqli_error($con);
    echo "Error";
}
