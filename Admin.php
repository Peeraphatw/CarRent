<!DOCTYPE html>
<?php
  session_start();
  if(!isset($_SESSION["Username"]))
  {
    header("Location:Admin_Loging.php");
  }
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
</head>
<style>
* {
    font-family: "Kanit", sans-serif;
}

.carousel {
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    /* border: 5px solid #D98880; */
    height: 50%;
}

img {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.Nav-bg {
    background-color: rgb(96, 50, 139);
}
</style>

<body class="bg-secondary">
    <nav class="navbar navbar-expand-lg navbar-light Nav-bg">
        <a class="navbar-brand text-white-50" href="#">
            <!-- <img
          src="/Asset/1889366.svg"
          width="25"
          height="25"
          alt="SVG"
          loading="lazy"
        /> -->
            <i class="fa fa-car text-black" aria-hidden="true"></i>
        </a>
        <a class="navbar-brand text-uppercase font-italic font-weight-bolder text-white" href="#">AN Carental</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white-50" href="index.php">หน้าหลัก <span
                            class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="Asset/Rent.JPG" target="_blank">รายระเอียดเช่ารถ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white-50" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        ประเภทรภ
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- <a class="dropdown-item" href="#">รถเล็ก</a>
              <a class="dropdown-item" href="#">รถเล็ก</a>
              <a class="dropdown-item" href="#">รถเล็ก</a> -->
                        <?php $cartype = array("SmallCar","Truck","SUV","Van"); 
              foreach($cartype as $TypeMenu){
              ?>
                        <a class="dropdown-item" href="ListCar.php?Type_Filter=<?=$TypeMenu?>"><?=$TypeMenu?></a>
                        <?php }?>
                        <a class="dropdown-item" href="Biling.php">Biling Carrent</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="admin.php">Admin Reservation Management</a>
                        <a class="dropdown-item" href="CarManager.php">Admin Car Management</a>
                    </div>
                </li>
                <!-- <li class="nav-item">
            <a
              class="nav-link disabled text-white-50"
              href="#"
              tabindex="-1"
              aria-disabled="true"
              >Disabled</a
            >
          </li> -->
            </ul>

        </div>
    </nav>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col">
                <div class="card shadow-lg">
                    <div class="card-header Nav-bg d-flex justify-content-between align-items-center">
                        <div class="text-capitalize font-italic font-weight-bold text-white">
                            <i class="fa fa-users mr-3" aria-hidden="true"></i>Reservation List
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                            <div class="input-group d-flex justify-content-center align-items-center flex-row">
                                <input type="text" name="ID_Search" class="form-control">
                                <input type="submit" class="btn btn-success" value="Find">
                            </div>
                        </form>
                    </div>
                    <div class="card-body p-0 m-0">
                        <table class="table table-responsive table-hover table-100 table-bordered p-0 m-0 w-100">
                            <thead>
                                <tr class="text-center">
                                    <th class="text-monospace">No.</th>
                                    <th class="text-monospace">Name</th>
                                    <th class="text-monospace">Address</th>
                                    <th class="text-monospace">Tel</th>
                                    <th class="text-monospace">Personnumber</th>
                                    <th class="text-monospace">Nickname</th>
                                    <th class="text-monospace">IdCard</th>
                                    <th class="text-monospace">DriverLicense</th>
                                    <th class="text-monospace">CarPicking</th>
                                    <th class="text-monospace">BilingPic</th>
                                    <th class="text-monospace">RentTime</th>
                                    <th class="text-monospace">ReturnTime</th>
                                    <th class="text-monospace">RentStatus</th>
                                    <th class="text-monospace">Actual Return</th>
                                    <th class="text-monospace">ConfirmRent</th>
                                    <th class="text-monospace">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $con = new mysqli("localhost","root","","V_carental");
                   if(isset($_GET["ID_Search"]) && $_GET["ID_Search"] <> "")
                   {
                    $query = "SELECT * FROM v_carental_reservation WHERE Personnumber = '$_GET[ID_Search]' ";
                   }
                   else
                   {
                    $query = "SELECT * FROM v_carental_reservation";
                   }
                   
                   $result = $con->query($query);
                   $No = 1;
                   while($row = $result->fetch_assoc())
                   {

                   
                  ?>
                                <tr>
                                    <td class="text-monospace"><?=$No?></td>
                                    <td class="text-monospace"><?=$row["Name"]?> Waikijjee</td>
                                    <td class="text-monospace"><?=$row["Address"]?></td>
                                    <td class="text-monospace"><?=$row["Tel"]?></td>
                                    <td class="text-monospace"><?=$row["Personnumber"]?></td>
                                    <td class="text-monospace"><?=$row["Nickname"]?></td>
                                    <td class="text-monospace"><a href="PersonId/<?=$row["PathPersonnumber"]?>"
                                            target="_blank"><button class="btn btn-success">ShowIdCard</button></a></td>

                                    <td class="text-monospace"><a href="DriverId/<?=$row["PathDriver"]?>"
                                            target="_blank"><button
                                                class="btn btn-success">ShowDriverLicense</button></a></td>

                                    <?php 
                            $con2 = new mysqli("localhost","root","","V_carental");
                            $select_path = "SELECT Path FROM v_carental_carmanager WHERE CarSequence = '$row[CarSequence]'";
                            $res = $con2->query($select_path);
                            $data_path = $res->fetch_assoc();

                      ?>
                                    <td class="text-monospace"><a href="CarStore/<?=$data_path["Path"]?>"
                                            target="_blank"><button class="btn btn-success">ShowCarPicking</button></a>
                                    </td>

                                    <td class="text-monospace"><a href="
                    <?php if($row["Biling"] <> "") {?>bilingPic/<?=$row["Biling"]?> <?php } else{ echo "#"; }?>
                    " target="_blank">
                                            <button class="btn btn-success" disable>ShowBiling</button></a></td>

                                    <td class="text-monospace"><?=$row["Rent_Time"]?></td>
                                    <td class="text-monospace"><?=$row["Return_Time"]?></td>
                                    <td class="text-monospace"><?=$row["RentStatus"]?></td>
                                    <td class="text-monospace"><?=$row["Actual_Return"]?>
                                        <?php
                      if($row["Actual_Return"] <> "")
                      {
                        echo "<br><a href='Bilprint.php?Personnumber=$row[Personnumber]'>Print Biling</a>";
                      }
                    ?>
                                    </td>

                                    <td class="text-center">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal"
                                            data-target="#exampleModal_Modify<?=$No?>">
                                            <i class="fa fa-wrench text-white" aria-hidden="true"></i>
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal_Modify<?=$No?>" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title text-dark" id="exampleModalLabel">
                                                            Modal title
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="confirmrent.php" method="GET">
                                                        <div class="modal-body text-dark">
                                                            <div class="form-row">
                                                                <label for="Username">RentStatus</label>
                                                                <select name="RentStatus" id="" class="form-control">
                                                                    <option value="<?=$row["RentStatus"]?>">
                                                                        <?=$row["RentStatus"]?></option>
                                                                    <?php
                                    $rentstatuslist = array("Padding","Confirmed","Returned");
                                    foreach($rentstatuslist as $rentstatus)
                                    {
                                      if($rentstatus <>$row["RentStatus"])
                                      {
                                        echo "<option value='$rentstatus'>$rentstatus</option>";
                                      }
                                      
                                    }
                                  ?>

                                                                </select>
                                                            </div>
                                                            <div class="form-row">
                                                                <label for="Actual_Return">Actual Return</label>
                                                                <input type="datetime-local" class="form-control"
                                                                    id="TimeRent1" name="Actual_Return" />
                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="MID" value="<?=$row["ID"]?>">
                                                        <input type="hidden" name="CarPicking"
                                                            value="<?=$row["CarSequence"]?>">
                                                        <div class="modal-footer">
                                                            <input type="submit" value="Confirm"
                                                                class="btn btn-success">
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>

                                                </div>
                                            </div>
                                        </div>
                    </div>
                    </td>
                    <td class="text-center">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-toggle="modal"
                            data-target="#exampleModal_Delete<?=$No?>">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal_Delete<?=$No?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                            Modal title
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-dark">
                                        Do You Want To Delete This Record <?=$row["ID"]?> ?
                                    </div>
                                    <div class="modal-footer">
                                        <form action="Delete_rent.php" id="Deleteform" Method="GET">
                                            <input type="hidden" name="DID" value="<?=$row["ID"]?>">
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                            Close
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </tr>

                    <?php
                $No++;
                }  
                ?>

                    </tbody>
                    </table>
                </div>
                <div class="card-footer Nav-bg font-italic font-weight-bold user-select-none">
                    Power By AN Carental
                </div>
            </div>
        </div>
    </div>
    </div>


    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper/dist/umd/popper.min.js"></script>
</body>

</html>