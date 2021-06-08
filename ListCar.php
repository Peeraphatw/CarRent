<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ListCar</title>
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

    .Nav-bg {
        background-color: rgb(96, 50, 139);
    }
    </style>
</head>

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
                        <?php $cartype = array("SmallCar", "Truck", "SUV", "Van");
foreach ($cartype as $TypeMenu) {
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
            <div class="col-sm-12 col-lg-2">
                <div class="card mt-3">
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" id="FilterForm" method="get">
                            <div class="form-group">
                                <label for="Brand">Brand </label>
                                <select name="Brand_Filter" class="custom-select" id="validationCustom04" required>
                                    <option readonly value="">Choose...</option>
                                    <?php
$con1 = new mysqli("localhost", "root", "", "V_carental");
$BrandFilter = "SELECT DISTINCT Brand FROM v_carental_carmanager";
$result = $con1->query($BrandFilter);
while ($bradarr = $result->fetch_assoc()) {
    ?>
                                    <option value="<?=$bradarr["Brand"]?>"><?=$bradarr["Brand"]?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="Type">Type</label>
                                <select class="custom-select" name="Type_Filter" id="validationCustom04" required>
                                    <option readonly value="">Choose...</option>
                                    <?php $cartype = array("SmallCar", "Truck", "SUV", "Van");
foreach ($cartype as $type) {
    ?>
                                    <option value="<?=$type?>"><?=$type?></option>
                                    <?php }?>
                                </select>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary" id="btnFilter">
                                    <i class="fa fa-filter mr-2" aria-hidden="true"></i>Filter
                                </button>
                                <script>
                                const AddCarBtn = document
                                    .getElementById("btnFilter")
                                    .addEventListener("click", () => {
                                        document.getElementById("FilterForm").submit();
                                    });
                                </script>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12 col-lg-10">
                <div class="row">
                    <?php

$con = new mysqli("localhost", "root", "", "V_carental");

$query = "SELECT * FROM v_carental_carmanager ORDER BY Type Desc";
if (isset($_GET["Type_Filter"]) && $_GET["Type_Filter"] != "") {
    $query = "SELECT * FROM v_carental_carmanager WHERE Type = '$_GET[Type_Filter]'";
}
if (isset($_GET["Brand_Filter"]) && $_GET["Brand_Filter"] != "") {
    $query = "SELECT * FROM v_carental_carmanager WHERE Brand = '$_GET[Brand_Filter]'";
}
if ((isset($_GET["Brand_Filter"]) && $_GET["Brand_Filter"] != "") && (isset($_GET["Type_Filter"]) && $_GET["Type_Filter"] != "")) {
    $query = "SELECT * FROM v_carental_carmanager WHERE Type = '$_GET[Type_Filter]' AND Brand = '$_GET[Brand_Filter]'";
}
$result = $con->query($query);

while ($row = $result->fetch_assoc()) {
    ?>
                    <div class="col-sm-12 col-lg-3">
                        <div class="card m-3">
                            <div class="card-header Nav-bg">
                                <h5 class="card-title font-italic text-white"><?=$row["Model"]?> <?=$row["Year"]?></h5>
                            </div>
                            <div class="card-body">
                                <img src="CarStore/<?=$row["Path"]?>" class="rounded mb-3 img-thumbnail border-info"
                                    alt="" />
                                <p class="font-weight-bold">Brand : <?=$row["Brand"]?></p>
                                <p class="font-weight-bold">Model : <?=$row["Model"]?></p>
                                <p class="font-weight-bold">Year : <?=$row["Year"]?></p>
                                <p class="font-weight-bold">Seat : <?=$row["Seat"]?></p>
                                <p class="font-weight-bold">Price : <?=number_format($row["Price"]) . " THB/Day"?></p>
                                <?php
switch ($row["Carstatus"]) {
        case "On Rent":
            echo "<div class='alert alert-primary' role='alert'>
                      " . $row["Carstatus"] . "
                      </div>
                    ";
            break;
        case "Available":
            echo "<div class='alert alert-success' role='alert'> " . $row["Carstatus"] . "</div>";
            break;
        case "Picking":
            echo "<div class='alert alert-warning' role='alert'> " . $row["Carstatus"] . "</div>";
            break;
        case "UnAvailable":
            echo "<div class='alert alert-danger' role='alert'> " . $row["Carstatus"] . "</div>";
            break;

    }
    ?>
                                <a href="Reserve.php?CarSequence=<?=$row["CarSequence"]?>"><button
                                        class="btn btn-primary">Rent</button></a>
                            </div>
                            <!-- <div class="card-footer">Footer</div> -->
                        </div>
                    </div>
                    <?php }?>

                    <!-- EndRow -->
                </div>
            </div>
        </div>
        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/popper.js/dist/popper.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script>
        $("#inputGroupFile02").on("change", function() {
            var fileName = $(this).val();
            console.log(fileName);
            $(this).next(".custom-file-label").html(fileName);
        });
        </script>
</body>

</html>