<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Biling</title>
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
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header bg-success">
                        <h4>Biling</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-row d-flex justify-content-center">
                            <form action="" class="d-flex justify-content-center align-items-center flex-column">
                                <label for="Personnumber">Personnumber</label>

                                <input type="text" name="Personnumber" class="form-control
                  m-3" value="" />
                                <input type="submit" value="Biling Search" class="btn btn-success" />
                            </form>
                        </div>
                        <?php if(isset($_REQUEST["Personnumber"])){ 
                $con = new mysqli("localhost","root","","V_carental");
                $query1 = "SELECT * FROM v_carental_reservation WHERE Personnumber = '$_REQUEST[Personnumber]'";
                $result1 = $con->query($query1);
                $data =  $result1->fetch_assoc();

                if($result1->num_rows <> 0){
                $query2 = "SELECT * FROM v_carental_carmanager WHERE CarSequence = '$data[CarSequence]'";
                $result2 = $con->query($query2);
                $data2 =  $result2->fetch_assoc();
                
              ?>
                        <div class="form-row d-flex justify-content-center align-items-center flex-column">
                            <img src="CarStore/<?=$data2['Path']?>" class="img-thumbnail m-5" alt="" />
                            <h4>Rent By <?=$data['Name']?></h4>
                            <h5>Rent Duration <?=$data['Rent_Time']?> To <?=$data['Return_Time']?> </h5>
                            <h5>Price Amout <?php 
                $date_date_rent = $data["Rent_Time"];
                $date_date_rent = strtotime($date_date_rent);
                $date_date_rent =  date('d', $date_date_rent);
                
                $date_date_Return = $data["Return_Time"];
                $date_date_Return = strtotime($date_date_Return);
                $date_date_Return =  date('d', $date_date_Return);
                echo number_format((($date_date_Return - $date_date_rent) + 1) * $data2["Price"] + 2000) ." THB";
                
                ?> </h5>
                            <label for="biling">UploadBiling</label>
                            <form action="Biling_Upload.php" method="POST" enctype="multipart/form-data"
                                class="d-flex justify-content-center flex-column">
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02"
                                            name="File_biling" />
                                        <label class="custom-file-label" for="inputGroupFile02"
                                            aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                    </div>
                                </div>
                                <input type="hidden" name="PID" value="<?=$data['Personnumber']?>">
                                <input type="submit" class="btn btn-success" value="UploadBiling" />
                            </form>
                        </div>

                        <?php }} ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper/dist/umd/popper.min.js"></script>
    <script>
    $("#inputGroupFile02").on("change", function() {
        var fileName = $(this).val();
        console.log(fileName);
        $(this).next(".custom-file-label").html(fileName);
    });
    </script>
</body>

</html>