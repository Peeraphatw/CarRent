<?php
    include("NotifyFunction.php");
    $PID = $_REQUEST["PID"];
    $con = new mysqli("localhost","root","","V_carental");

    if( $_FILES['File_biling']['name'] <>"")
    {
        $BilingSequence = uniqid("BI_");
        $path = "BilingPic/";
        $type = strrchr($_FILES['File_biling']['name'],".");
        $newname = $BilingSequence.$type;
        $path_copy=$path.$newname;
        $resultMove = move_uploaded_file($_FILES['File_biling']['tmp_name'],$path_copy);

        if($resultMove)
        {
            
            $query = "UPDATE v_carental_reservation SET Biling = '$newname' WHERE Personnumber = '$PID'";
            if($con->query($query))
            {
                notify_message("\nAlert Biling Upload ID:".$PID,"8SEmmYZ1JiagKn0ZcErw2Cays4vFoZRe199OTF3goFZ");
                header("Location:Index.php");
            }
            else
            {
                echo mysqli_error($con);
            }
        }
        else
        {
            echo "Not Move";
        }
    }else
    {
        echo "Not Move";
    }