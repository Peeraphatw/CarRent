<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet" />
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
</head>

<body>
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
                    <a class="nav-link text-white-50" href="#">หน้าหลัก <span class="sr-only">(current)</span></a>
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
                        <?php $cartype = array("SmallCar","Truck","SUV","Van"); 
              foreach($cartype as $TypeMenu){
              ?>
                        <a class="dropdown-item" href="ListCar.php?Type_Filter=<?=$TypeMenu?>"><?=$TypeMenu?></a>
                        <?php }?>
                        <a class="dropdown-item" href="Biling.php">Biling Carrent</a>
                        <!-- <a class="dropdown-item" href="#">รถเล็ก</a>
              <a class="dropdown-item" href="#">รถเล็ก</a> -->
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
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="Asset/civic-type-r.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="Asset/civic-type-r-2.jpg" class="d-block w-100" alt="..." />
            </div>
            <div class="carousel-item">
                <img src="Asset/civic-type-r-3.jpg" class="d-block w-100" alt="..." />
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div
                class="col-lg-12 d-flex flex-row justify-content-center align-item-center mb-3 bg-secondary p-3 flex-wrap">
                <!-- <button type="button" class="btn btn-dark btn-lg m-2">
            <h5><i class="fa fa-car mr-1"></i>รถเล็ก</h5>
          </button> -->
                <?php $cartype = array("SmallCar","Truck","SUV","Van");
            foreach($cartype as $Type){
          ?>
                <a href="ListCar.php?Type_Filter=<?=$Type?>">
                    <button type="button" class="btn btn-dark btn-lg m-2">
                        <h5><i class="fa fa-car mr-1"></i><?=$Type?></h5>
                    </button>
                </a>
                <?php } ?>
                <!-- <button type="button" class="btn btn-dark btn-lg m-2">
            <h5><i class="fa fa-car mr-1"></i>รถเล็ก</h5>
          </button> -->
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-between align-items-center p-5 flex-wrap">
                <?php 
        $con = new mysqli("localhost","root","","V_carental");
        $query = "SELECT * FROM `v_carental_carmanager` GROUP BY Type ORDER BY ID DESC";
        $result = $con->query($query);
        while($data = $result->fetch_assoc()){
        ?>
                <div class="card shadow-lg mb-3" style="width: 25rem">
                    <img src="CarStore/<?=$data["Path"]?>" class="card-img-top" alt="..." />
                    <div class="card-body">
                        <h3 class="card-title"><?=$data["Model"]?> <?=$data["Year"]?></h3>
                        <h5 class="card-text">Seat: <?=$data["Seat"]?></h5>
                        <h5 class="card-text">RentRate: <?=number_format($data["Price"])." THB"?>/perday</h5>
                        <!-- <p class="card-text user-select-none">
                Some quick example text to build on the card title and make up
                the bulk of the card's content.
              </p> -->
                        <?php
                  switch ($data["Carstatus"]) {
                    case "On Rent":
                      echo "<div class='alert alert-primary' role='alert'>
                      ".$data["Carstatus"]."
                      </div>
                    ";
                      break;
                      case "Available":
                        echo "<div class='alert alert-success' role='alert'> ".$data["Carstatus"]."</div>";
                        break;
                      case "Picking":
                          echo "<div class='alert alert-warning' role='alert'> ".$data["Carstatus"]."</div>";
                        break;
                      case "UnAvailable":
                          echo "<div class='alert alert-danger' role='alert'> ".$data["Carstatus"]."</div>";
                        break;  
                          
                  }
                  ?>
                        <a href="Reserve.php?CarSequence=<?=$data["CarSequence"]?>"><button
                                class="btn btn-primary">Rent</button></a>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
        <div class="row">
            <div class="col bg-secondary d-flex align-items-center justify-content-start">

                <!-- <ul class="list-unstyled d-flex justify-content-center">
            <li>1</li>
            <li>1</li>
            <li>1</li>
          </ul> -->
            </div>
        </div>
    </div>

    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="bootstrap-4.5.2-dist/bootstrap-4.5.2-dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>

</html>