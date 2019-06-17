<?php
if(!empty($_POST["delete"])){
    require "functionsCity.php";
    $cityId = isset($_POST['cityId'])?$_POST["cityId"]:'';
    deleteCity($cityId);
}
header("Location:listCity.php");

