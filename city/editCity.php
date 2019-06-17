<?php
require "functionsCity.php";


$edit_data = array();
$validate = array();

if (!empty($_GET["cityId"])) {
    $edit_data = getCities($_GET["cityId"]);
}

if (!empty($_POST["submit"])) {
    if (empty($_POST['cityId'])) {
        $validate["cityId"] = "ID can not empty!";
    }
    if (empty($_POST['cityName'])) {
        $validate["cityName"] = "Name can not empty!";
    }
    if (empty($_POST['cityCode'])) {
        $validate["cityCode"] = "Code can not empty!";
    }
    if (empty($validate)) {
        $edit_data["countryId"] = isset($_POST["countryId"]) ? $_POST["countryId"] : '';
        $edit_data["cityId"] = isset($_POST["cityId"]) ? $_POST["cityId"] : '';
        $edit_data["cityName"] = isset($_POST["cityName"]) ? $_POST["cityName"] : '';
        $edit_data["cityCode"] = isset($_POST["cityCode"]) ? $_POST["cityCode"] : '';
        editCity($edit_data["countryId"],$edit_data["cityId"], $edit_data["cityName"], $edit_data["cityCode"]);
        header("Location:listCity.php?countryId=".$_GET["countryId"]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit city</title>
    <meta charset="UTF-8"/>
</head>
<body>
<form action="" method="post">
    <input type="hidden" value="<?php echo !empty($edit_data["countryId"]) ? $edit_data['countryId'] : ''; ?>"
           name="countryId"/>
    <input type="hidden" value="<?php echo !empty($edit_data["cityId"]) ? $edit_data['cityId'] : ''; ?>"
           name="cityId"/>
    Name:
    <input type="text" value="<?php echo !empty($edit_data["cityName"]) ? $edit_data['cityName'] : ''; ?>"
           name="cityName"/>
    Code:
    <input type="text" value="<?php echo !empty($edit_data["cityCode"]) ? $edit_data['cityCode'] : ''; ?>"
           name="cityCode"/>
    <input type="submit" name="submit" value="Update"/><br/>
    <?php
    echo !empty($validate["cityId"]) ? $validate["cityId"] . "<br/>" : '';
    echo !empty($validate["cityName"]) ? $validate["cityName"] . "<br/>" : '';
    echo !empty($validate["cityCode"]) ? $validate["cityCode"] . "<br/>" : '';
    ?>

</form>
</body>

</html>