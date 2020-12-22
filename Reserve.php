<!DOCTYPE html>
<?php
  session_start();
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reserve</title>
  </head>
  <link
    rel="stylesheet"
    href="node_modules/font-awesome/css/font-awesome.min.css"
  />
  <link
    rel="stylesheet"
    href="node_modules/bootstrap/dist/css/bootstrap.min.css"
  />

  <link
    href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap"
    rel="stylesheet"
  />

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
      <a
        class="navbar-brand text-uppercase font-italic font-weight-bolder text-white"
        href="#"
        >AN Carental</a
      >
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white-50" href="index.php"
              >หน้าหลัก <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item">
          <a class="nav-link text-white-50" href="Asset/Rent.JPG" target="_blank">รายระเอียดเช่ารถ</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle text-white-50"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              ประเภทรภ
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
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
    <?php
      $CarSequnece = $_GET["CarSequence"];
      $con = new mysqli("localhost","root","","V_carental");
      $query = "SELECT Path,Model,Year FROM v_carental_carmanager WHERE CarSequence = '$CarSequnece'";
      $result = $con->query($query);
      if($result->num_rows <> 0)
      {
        $data =  $result->fetch_assoc();
      }
    ?>
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <div class="card mb-5 border-dark shadow-lg">
            <div class="card-header Nav-bg">
              <h4 class="card-text font-italic font-weight-bold text-white">
                Car Reserve
              </h4>
            </div>
            <div class="card-body">
              <div class="form-group row">
                <div class="col">
                  <img
                    src="CarStore/<?=$data["Path"]?>"
                    class="shadow-lg rounded img-thumbnail"
                    alt=""
                  />
                </div>
                <h5
                  for="inputEmail3"
                  class="col-12 text-center font-weight-bold p-2"
                >
                <?=$data["Model"]?> <?=$data["Year"]?>
                </h5>
              </div>

              <form action="Reservetion.php"  method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                  <label for="inputEmail3" class="col-sm-2 col-form-label"
                    >Name</label
                  >
                  <div class="col-sm-10">
                    <input type="text" name="Name_Picker" class="form-control" id="inputEmail3" />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"
                    >Personnal Number</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="inputPassword4"
                      name="Personnal_Number"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"
                    >Address</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="inputPassword5"
                      name="Address"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"
                    >Tel</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="tel"
                      class="form-control"
                      id="inputPassword5"
                      name="Tel"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword3" class="col-sm-2 col-form-label"
                    >Nickname</label
                  >
                  <div class="col-sm-10">
                    <input
                      type="text"
                      class="form-control"
                      id="inputPassword3"
                      name="Nickname"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">Rent Time</div>
                  <div class="col-sm-10">
                    <input
                      type="datetime-local"
                      class="form-control"
                      id="TimeRent1"
                      name="Rent_Time"
                    />
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-2">Return Time</div>
                  <div class="col-sm-10">
                    <input
                      type="datetime-local"
                      class="form-control"
                      id="TimeRent2"
                      name="Return_Time"
                    />
                  </div>
                </div>
                <div class="form-row">
                  <label for="Personnal Number">Personnal Id Card</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input
                        type="file"
                        class="custom-file-input"
                        id="inputGroupFile01"
                        name="Personnal_Id"
                      />
                      <label
                        class="custom-file-label"
                        for="inputGroupFile01"
                        aria-describedby="inputGroupFileAddon01"
                        >Choose file</label
                      >
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="inputGroupFileAddon02"
                        >Upload</span
                      >
                    </div>
                  </div>
                </div>

                <div class="form-row">
                  <label for="Personnal Number">Driver License</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input
                        type="file"
                        class="custom-file-input"
                        id="inputGroupFile02"
                        name="Driver_License"
                      />
                      <label
                        class="custom-file-label"
                        for="inputGroupFile02"
                        aria-describedby="inputGroupFileAddon02"
                        >Choose file</label
                      >
                    </div>
                    <div class="input-group-append">
                      <span class="input-group-text" id="inputGroupFileAddon02"
                        >Upload</span
                      >
                    </div>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <input type="submit" value="Rent" class="btn btn-success">
                  </div>
                </div>
                <input type="hidden" name="CarSequence" value=<?=$CarSequnece?>>
              </form>
              <div class="form-group row">
                <div class="col-sm-12">
                  <ul class="list-unstyled">
                    <li>
                      1. รับรถ 12.00 คืน 12.00
                    </li>
                    <li>2. หากเลยเวลา ปรับ ชั่วโมงละ 100 บาท</li>
                    <li>
                      3. ประกันรถยนต์ 2,000 บาท คืนหลังจากคืนรถ
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="card-footer font-italic font-weight-bold Nav-bg text-white">
              Power By Carental
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script>
      $("#inputGroupFile02").on("change", function () {
        var fileName = $(this).val();
        console.log(fileName);
        $(this).next(".custom-file-label").html(fileName);
      });

      $("#inputGroupFile01").on("change", function () {
        var fileName = $(this).val();
        console.log(fileName);
        $(this).next(".custom-file-label").html(fileName);
      });

     
    </script>
   
    </script>
  </body>
</html>
