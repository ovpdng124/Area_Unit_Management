<?php
require "functionsDistrict.php";


$edit_data = array();
$validate = array();

if (!empty($_GET["districtId"])) {
    $edit_data = getDistricts($_GET["districtId"]);
}

if (!empty($_POST["submit"])) {
    if (empty($_POST['districtId'])) {
        $validate["districtId"] = "ID can not empty!";
    }
    if (empty($_POST['districtName'])) {
        $validate["districtName"] = "Name can not empty!";
    }
    if (empty($_POST['districtCode'])) {
        $validate["districtCode"] = "Code can not empty!";
    }
    if (empty($validate)) {
        $edit_data["cityId"] = isset($_POST["cityId"]) ? $_POST["cityId"] : '';
        $edit_data["districtId"] = isset($_POST["districtId"]) ? $_POST["districtId"] : '';
        $edit_data["districtName"] = isset($_POST["districtName"]) ? $_POST["districtName"] : '';
        $edit_data["districtCode"] = isset($_POST["districtCode"]) ? $_POST["districtCode"] : '';
        editdistrict($edit_data["cityId"],$edit_data["districtId"], $edit_data["districtName"], $edit_data["districtCode"]);
        header("Location:listDistrict.php?cityId=".$_GET["cityId"]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit District</title>
    <meta charset="UTF-8"/>
</head>
<body>
<form action="" method="post">
    <input type="hidden" value="<?php echo !empty($edit_data["cityId"]) ? $edit_data['cityId'] : ''; ?>"
           name="cityId"/>
    <input type="hidden" value="<?php echo !empty($edit_data["districtId"]) ? $edit_data['districtId'] : ''; ?>"
           name="districtId"/>
    Name:
    <input type="text" value="<?php echo !empty($edit_data["districtName"]) ? $edit_data['districtName'] : ''; ?>"
           name="districtName"/>
    Code:
    <input type="text" value="<?php echo !empty($edit_data["districtCode"]) ? $edit_data['districtCode'] : ''; ?>"
           name="districtCode"/>
    <input type="submit" name="submit" value="Update"/><br/>
    <?php
    echo !empty($validate["districtId"]) ? $validate["districtId"] . "<br/>" : '';
    echo !empty($validate["districtName"]) ? $validate["districtName"] . "<br/>" : '';
    echo !empty($validate["districtCode"]) ? $validate["districtCode"] . "<br/>" : '';
    ?>

</form>
</body>

</html>