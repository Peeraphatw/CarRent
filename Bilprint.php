<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Carental</title>
    <link
      rel="stylesheet"
      href="node_modules/bootstrap/dist/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="node_modules/font-awesome/css/font-awesome.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@200&display=swap" rel="stylesheet">
    <style>
      *{
        font-family: 'Sarabun', sans-serif;
      }
      body {
        background: rgb(204, 204, 204);
      }
      page {
        background: white;
        display: block;
        margin: 0 auto;
        margin-bottom: 0.5cm;
        box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
      }
      page[size="A4"] {
        width: 21cm;
        height: 15.7cm;
      }
      page[size="A4"][layout="landscape"] {
        width: 29.7cm;
        height: 21cm;
      }
      /* page[size="A3"] {
        width: 29.7cm;
        height: 42cm;
      }
      page[size="A3"][layout="landscape"] {
        width: 42cm;
        height: 29.7cm;
      }
      page[size="A5"] {
        width: 14.8cm;
        height: 21cm;
      }
      page[size="A5"][layout="landscape"] {
        width: 21cm;
        height: 14.8cm;
      } */
      @media print {
        body,
        page {
          margin: 0;
          box-shadow: 0;
        }
      }
    </style>
  </head>
  <body onload="window.print()">
  <?php
    if(isset($_GET["Personnumber"]))
    {
      $con = new mysqli("localhost","root","","v_carental");
      $query = "SELECT * FROM v_carental_reservation WHERE Personnumber = '$_GET[Personnumber]'";
      $result = $con->query($query);

      $data = $result->fetch_assoc();
    }
  ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 text-center font-weight-bold mb-5">
          <h3>ใบเสร็จ</h3>
          <h4 class="font-italic font-weight-bold">AN Carental</h4>
        </div>
        <div class="col-12">
          <label for="">ชื่อบริษัท : บริษัท เอเอน คาร์เรนเทล จำกัด (มหาชน)</label><br />
          <label for=""
            >ที่ตั้งสำนักงานใหญ่ : เลขที่ 59 ซอยริมคลองพระโขนง​ แขวงพระโขนงเหนือ
            เขตวัฒนา​ กรุงเทพมหานคร 10110</label
          >
          <br />
          <label for="">วันที่:19/05/2020</label>
          <hr />
          <label for="">ผู้เช่า: <?=$data["Name"]?></label> <br />
          <label for="">เลขที่: <?=$data["Personnumber"]?></label><br />
          <label for="">วันที่:<?=date("d-m-y");?></label>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <table class="table table-bordered w-100">
            <thead>
              <tr class="bg-success">
                <th style="width: 5%">ลำดับ</th>
                <th class="text-center">รายการ</th>
                <th style="width: 15%" class="text-center">กำหนดคืนรถ</th>
                <th style="width: 15%" class="text-center">เวลาคืน</th>
                <th style="width: 15%" class="text-center">ราคา</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>
                  <?php
                    $query2 = "SELECT * FROM v_carental_carmanager WHERE CarSequence = '$data[CarSequence]'";
                    $res = $con->query($query2);
                    $data2 = $res->fetch_assoc();
                    echo $data2["Model"]." ".$data2["Year"];
                  ?>
                  <img src="CarStore/<?=$data2["Path"]?>" alt="" width="450px">
                </td>
                <td><?=$data["Return_Time"]?></td>
                <td><?=$data["Actual_Return"]?></td>
                <td><?php 
                $date_date_rent = $data["Rent_Time"];
                $date_date_rent = strtotime($date_date_rent);
                $date_date_rent =  date('d', $date_date_rent);
                
                $date_date_Return = $data["Return_Time"];
                $date_date_Return = strtotime($date_date_Return);
                $date_date_Return =  date('d', $date_date_Return);
                $nomal_price = (($date_date_Return - $date_date_rent) + 1) * $data2["Price"] ;
                echo number_format($nomal_price) ." THB";
                
                ?></td>
              </tr>
            
            </tbody>
            <tfoot>
              <tr class="">
                <td colspan="4" class="text-center">รวม *ประกัน 2,000 บาท</td>
                <td><?php
                $Overtime_price = 0;
                if($data["Actual_Return"] > $data["Return_Time"])
                {
                  $date_actual = $data["Actual_Return"];
                  $date_actual = strtotime($date_actual);
                  $date_actual =  date('H', $date_actual);

                  $date_date_actual = $data["Actual_Return"];
                  $date_date_actual = strtotime($date_date_actual);
                  $date_date_actual =  date('d', $date_date_actual);
                  

                  $date_return = $data["Return_Time"];
                  $date_return = strtotime($date_return);
                  $date_return_h =  date('H', $date_return);
                 
                  $date_date_return = $data["Return_Time"];
                  $date_date_return = strtotime($date_date_return);
                  $date_date_return =  date('d', $date_date_return);
                 
                  if(($date_date_actual == $date_date_return ) && $date_actual > 12 && ($date_return_h <= 12))
                  {
                   $Overtime_price =+ 100;
                  }
                  if($date_date_actual > $date_date_return)
                  {
                    $Overtime_price  += ($date_date_actual - $date_date_return) * 24 * 100;
                  }
                  
                }
                  $actual_price = $nomal_price + $Overtime_price;
                  //echo number_format($data2["Price"] + $Overtime_price) ."THB" ;
                  echo number_format($actual_price + 2000) ."THB" ;
                ?> </td>
              </tr>
            </tfoot>
          </table>
        </div>
      </div>
      <div class="row fixed-bottom">
        <div class="col d-flex justify-content-end">
          <div
            class="d-flex justify-content-center align-items-center flex-column"
          >
            <label for="" class="m-5"><h5>ผ้รู้บเงิน</h5></label>
            <label for=""
              >..............................................................</label
            >
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
