<?php
require "functionsCountry.php";

$edit_data = array();
$validate = array();

if (!empty($_GET["countryId"])) {
    $edit_data = getCountries($_GET["countryId"]);
}
if (isset($_POST['submit'])) {
    if (empty($_POST['countryId'])) {
        $validate["countryId"] = "Id can not empty!";
    }
    if (empty($_POST['countryName'])) {
        $validate["countryName"] = "Name can not empty!";
    }
    if (empty($_POST['countryCode'])) {
        $validate["countryCode"] = "Code can not empty!";
    }

    if (empty($validate)) {
        $edit_data ['countryId'] = isset($_POST['countryId']) ? $_POST['countryId'] : '';
        $edit_data ['countryName'] = isset($_POST['countryName']) ? $_POST['countryName'] : '';
        $edit_data  ['countryCode'] = isset($_POST['countryCode']) ? $_POST['countryCode'] : '';
        editCountry($edit_data["countryId"], $edit_data['countryName'], $edit_data['countryCode']);
        header("Location:listCountry.php");
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit country</title>
    <meta charset="UTF-8"/>
</head>
<body>
<form action="" method="post">
    <input type="hidden" value="<?php echo !empty($edit_data["countryId"]) ? $edit_data['countryId'] : ''; ?>"
           name="countryId"/>
    Name:
    <input type="text" value="<?php echo !empty($edit_data["countryName"]) ? $edit_data['countryName'] : ''; ?>"
           name="countryName"/>
    Code:
    <input type="text" value="<?php echo !empty($edit_data["countryCode"]) ? $edit_data['countryCode'] : ''; ?>"
           name="countryCode"/>
    <input type="submit" name="submit" value="Update"/><br/>
    <?php
    echo !empty($validate["countryId"]) ? $validate["countryId"]."<br/>" : '';
    echo !empty($validate["countryName"]) ? $validate["countryName"]."<br/>" : '';
    echo !empty($validate["countryCode"]) ? $validate["countryCode"]."<br/>" : '';
    ?>

</form>
</body>

</html>