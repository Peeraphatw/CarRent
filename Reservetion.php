<?php
    $CarSequence = $_REQUEST["CarSequence"];
    $Name = $_REQUEST["Name_Picker"];
    $Address = $_REQUEST["Address"];
    $Tel = $_REQUEST["Tel"];
    $RentTime=date_format(date_create($_REQUEST["Rent_Time"]),'d-m-Y H:i');
    $ReturnTime=date_format(date_create($_REQUEST["Return_Time"]),'d-m-Y H:i');

    $Personnumber = $_REQUEST["Personnal_Number"];
    $Nickname = $_REQUEST["Nickname"];
    
 
            if(($_FILES['Personnal_Id'] <> "") && ($_FILES['Driver_License'] <> " "))
            {
                $PID = uniqid("PID_");
                $path_for_personId = "PersonId/";
                $type = strrchr($_FILES['Personnal_Id']['name'],".");
                $newname = $PID.$Personnumber.$type;
                $path_copy=$path_for_personId.$newname;
                $resultMove = move_uploaded_file($_FILES['Personnal_Id']['tmp_name'],$path_copy);
            

                $DID = uniqid("DID_");
                $path_for_driverId = "DriverId/";
                $type2 = strrchr($_FILES['Driver_License']['name'],".");
                $newname2 = $DID.$Personnumber.$type2;
                $path_copy2=$path_for_driverId.$newname2;
                $resultMove2 = move_uploaded_file($_FILES['Driver_License']['tmp_name'],$path_copy2);

                if(($resultMove2 == TRUE) && ($resultMove == TRUE))
                {
                    $con = new mysqli("localhost","root","","V_carental");
                    $query = "INSERT INTO v_carental_reservation (Name, Address,Tel,Personnumber,Nickname,PathPersonnumber,PathDriver,CarSequence,Rent_Time,Return_Time,RentStatus)
                    VALUES ('$Name', '$Address','$Tel','$Personnumber','$Nickname','$newname','$newname2','$CarSequence','$RentTime','$ReturnTime','Padding')";

                    if($con->query($query))
                    {
                       
                       header("Location:Biling.php");
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

            }
            else
            {
                echo "Null";
            }

           

            
        