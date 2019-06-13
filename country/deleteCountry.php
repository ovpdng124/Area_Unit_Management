<?php
if(!empty($_POST['delete'])){
    require "functionsCountry.php";
    $countryId = isset($_POST['countryId'])? $_POST['countryId']: "";
    deleteCountry($countryId);
}
header("Location:listCountry.php");
