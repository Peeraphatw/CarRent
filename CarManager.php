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
    <title>Document</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.min.css"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap"
      rel="stylesheet"
    />
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
              <!-- <a class="dropdown-item" href="#">รถเล็ก</a>
              <a class="dropdown-item" href="#">รถเล็ก</a>
              <a class="dropdown-item" href="#">รถเล็ก</a>
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
    <div class="container mt-5">
      <div class="row">
        <div class="col">
          <div class="card shadow-lg">
            <div
              class="card-header Nav-bg d-flex justify-content-between align-items-center"
            >
              <div class="text-capitalize font-italic font-weight-bold text-white">
                <i class="fa fa-users mr-3" aria-hidden="true"></i>CarManager
              </div>
              <button
                type="button"
                class="btn btn-success"
                data-toggle="modal"
                data-target="#exampleModal"
              >
                Add Car
              </button>
            </div>
            <div class="card-body p-0 m-0">
              <table
                class="table table-responsive table-hover table-100 table-bordered p-0 m-0 w-100"
              >
                <thead>
                  <tr class="text-center">
                    <th class="text-monospace">No.</th>
                    <th class="text-monospace">CarSequence</th>
                    <th class="text-monospace">Brand</th>
                    <th class="text-monospace">Model</th>
                    <th class="text-monospace">Year</th>
                    <th class="text-monospace">Seat</th>
                    <th class="text-monospace">Price</th>
                    <th class="text-monospace">Type</th>
                    <th class="text-monospace">Path</th>
                    <th class="text-monospace">Carstatus</th>
                    <th class="text-monospace">Modify</th>
                    <th class="text-monospace">Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                   $con = new mysqli("localhost","root","","v_carental");
                   $query = "SELECT * FROM v_carental_carmanager";
                   $result = $con->query($query); $No = 1; 
                   while($row = $result->fetch_assoc()) { ?>
                  <tr>
                    <td class="text-monospace"><?=$No?></td>
                    <td class="text-monospace"><?=$row["CarSequence"]?></td>
                    <td class="text-monospace"><?=$row["Brand"]?></td>
                    <td class="text-monospace"><?=$row["Model"]?></td>
                    <td class="text-monospace"><?=$row["Year"]?></td>
                    <td class="text-monospace"><?=$row["Seat"]?></td>
                    <td class="text-monospace"><?=number_format($row["Price"])." THB"?></td>
                    <td class="text-monospace"><?=$row["Type"]?></td>
                    <td class="text-monospace"><a href="CarStore/<?=$row["Path"]?>" target="_blank"><button class="btn btn-success">ShowCar</button></a></td>
                    <td class="text-monospace">
                      <?=$row["Carstatus"]?>
                    </td>

                    <td class="text-center">
                      <!-- Button trigger modal -->
                      <button
                        type="button"
                        class="btn btn-warning"
                        data-toggle="modal"
                        data-target="#exampleModal_Modify<?=$No?>"
                      >
                        <i
                          class="fa fa-wrench text-white"
                          aria-hidden="true"
                        ></i>
                      </button>

                      <!-- Modal -->
                      <div
                        class="modal fade"
                        id="exampleModal_Modify<?=$No?>"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5
                                class="modal-title text-dark"
                                id="exampleModalLabel"
                              >
                                Modal title
                              </h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            
                            <form
                              action="Modify.php"
                              id="Modifyform"
                              method="GET"
                              enctype="multipart/form-data"
                            >
                              <div class="modal-body text-dark">
                                <div class="form-row">
                                  <label for="CarSequence">CarSequence</label>
                                  <input type="text"
                                  class="form-control" readonly value="<?=$row["CarSequence"]?>"
                                  />
                                </div>
                                <div class="form-row">
                                <label for="Personnal Number">Carpath</label>
                                
                                  <img src="CarStore/<?=$row["Path"]?>" class="img-thumbnail mb-2" alt="">
                                  
                                  <div class="input-group mb-3">
                                    <div class="custom-file">
                                      <input
                                        type="file"
                                        class="custom-file-input"
                                        id="inputGroupFile01"
                                        name="fileupload"
                                      />
                                      <label
                                        class="custom-file-label"
                                        for="inputGroupFile01"
                                
                                        aria-describedby="inputGroupFileAddon02"
                                        >Choose file</label
                                      >
                                    </div>
                                    <div class="input-group-append">
                                      <span
                                        class="input-group-text"
                                        id="inputGroupFileAddon02"
                                        >Upload</span
                                      >
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <label for="Brand">Brand</label>
                                  <input type="text" name="Brand"
                                  class="form-control" value="<?=$row["Brand"]?>"
                                  />
                                </div>
                                <div class="form-row">
                                  <label for="Model">Model</label>
                                  <input type="text" name="Model"
                                  class="form-control" value="<?=$row["Model"]?>"
                                  />
                                </div>
                                <div class="form-row">
                                  <label for="Year">Year</label>
                                  <input type="text" name="Year"
                                  class="form-control" value="<?=$row["Year"]?>"
                                  />
                                </div>
                                <div class="form-row">
                                  <label for="Seat">Seat</label>
                                  <input type="text" name ="Seat"
                                  class="form-control" value="<?=$row["Seat"]?>"
                                  />
                                </div>
                                <div class="form-row">
                                  <label for="Price">Price</label>
                                  <input type="text" name ="Price"
                                  class="form-control" value="<?=number_format($row["Price"])." THB"?>"/>
                                </div>
                                <div class="form-row">
                                  <label for="Type">Type</label>
                                  <select name="Type" id="" class="form-control">
                                  <option><?=$row["Type"]?></option>
                <?php 
                  $cartype = array("SmallCar","Truck","SUV","Van");
                  foreach($cartype as $type)
                  { if($type <> $row["Type"]){
                ?>
                            <option><?=$type?></option>
                <?php } }?>
                              </select>
                                </div>
                                <div class="form-row">
                                  <label for="Carstatus">Carstatus</label>
                                  <select name="Carstatus" class="form-control">
                                  <option value="<?=$row["Carstatus"]?>"><?=$row["Carstatus"]?></option>
                                    <?php 
                                     $Carstatus = array("Available","Picking","On Rent","UnAvailable");
                                      foreach($Carstatus as $Status){
                                      if($Status <> $row["Carstatus"])
                                      {                           
                                    ?>
                                    <option value="<?=$Status?>"><?=$Status?></option>                              
                                    <?php } } ?>
                                  </select>
                                  
                                </div>
                              </div>
                            <div class="modal-footer">
                             <input type="hidden" name="MID" value="<?=$row["ID"]?>">
                             <input type="submit" value="Modify" class="btn btn-success">
                             </form> 
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                              >
                                Close
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="text-center">
                      <!-- Button trigger modal -->
                      <button
                        type="button"
                        class="btn btn-danger"
                        data-toggle="modal"
                        data-target="#exampleModal_Delete<?=$No?>"
                      >
                        <i class="fa fa-trash" aria-hidden="true"></i>
                      </button>

                      <!-- Modal -->
                      <div
                        class="modal fade"
                        id="exampleModal_Delete<?=$No?>"
                        tabindex="-1"
                        aria-labelledby="exampleModalLabel"
                        aria-hidden="true"
                      >
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                Modal title
                              </h5>
                              <button
                                type="button"
                                class="close"
                                data-dismiss="modal"
                                aria-label="Close"
                              >
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body text-dark">
                              Do You Want To Delete This Record
                              <?=$row["ID"]?>
                              ?
                            </div>
                            <div class="modal-footer">
                             <form action="Delete.php" method="GET">
                              <input type="hidden" name="DeletePath" value="<?=$row["Path"]?>">
                              <input type="hidden" name="DID" value="<?=$row["ID"]?>">
                              <input type="submit" name="submit" value="delete" class="btn btn-danger">
                              </form> 
                              <button
                                type="button"
                                class="btn btn-secondary"
                                data-dismiss="modal"
                              >
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
            <div
              class="card-footer Nav-bg font-italic font-weight-bold user-select-none"
            >
              Power By AN Carental
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="AddCar.php" id="AddCarForm" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <label for="Personnal Number">Carpath Image</label>
                <div class="input-group mb-3">
                  <div class="custom-file">
                    <input
                      type="file"
                      class="custom-file-input"
                      id="inputGroupFile02"
                      name="fileupload"
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
              <div class="form-row">
                <label for="Brand">Brand</label>
                <input type="text" name="Brand" class="form-control" />
              </div>
              <div class="form-row">
                <label for="Model">Model</label>
                <input type="text" name="Model" class="form-control" />
              </div>
              <div class="form-row">
                <label for="Year">Year</label>
                <input type="text" name="Year" class="form-control" />
              </div>
              <div class="form-row">
                <label for="Seat">Seat</label>
                <input type="text" name="Seat" class="form-control" />
              </div>
              <div class="form-row">
                <label for="Type">Type</label>
                <select name="Type" id="" class="form-control">  
                <?php 
                  $cartype = array("SmallCar","Truck","SUV","Van");
                  foreach($cartype as $type)
                  {
                ?>
                 <option><?=$type?></option>
                <?php }?>
                </select>
              </div>
              <div class="form-row">
                <label for="Price">Price</label>
                <input type="text" name="Price" class="form-control" />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="AddCar" class="btn btn-primary">
              Save changes
            </button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper/dist/umd/popper.min.js"></script>
    
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
    <script>
      const AddCarBtn = document
        .getElementById("AddCar")
        .addEventListener("click", () => {
          document.getElementById("AddCarForm").submit();
        });
    </script>
  </body>
</html>
