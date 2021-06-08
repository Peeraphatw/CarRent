<?php
session_start();
$con = new mysqli("localhost", "root", "", "v_carental");

$query = "SELECT * FROM v_admin";

$res = $con->query($query);

if ($res->num_rows != 0) {
    $data = $res->fetch_assoc();

    $_SESSION["Username"] = $data["Username"];
    $_SESSION["Password"] = $data["Password"];

    header("Location:Admin.php");
}