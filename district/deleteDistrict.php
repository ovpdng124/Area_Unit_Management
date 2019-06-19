<?php
if(!empty($_POST["delete"])){
    require "functionsDistrict.php";
    $districtId = isset($_POST['districtId'])?$_POST["districtId"]:'';
    deleteDistrict($districtId);
}
header("Location:listDistrict.php?cityId=".$_GET["cityId"]);

