<?php
require "functionsCountry.php";

$countries = getAllCountries();
$data = array();
$validate = array();


if (!empty($_POST['submit'])) {
    foreach ($countries as $element) {
        if ($element["countryId"] == $_POST["countryId"]) {
            $validate["existed"] = "This ID is existed!";
        }
    }
    $data["countryId"] = isset($_POST['countryId']) ? $_POST['countryId'] : "";
    $data["countryName"] = isset($_POST['countryName']) ? $_POST['countryName'] : "";
    $data["countryCode"] = isset($_POST['countryCode']) ? $_POST['countryCode'] : "";
    if (empty($data['countryId'])) {
        $validate["countryId"] = "Country ID can not empty";
    }
    if (empty($data['countryName'])) {
        $validate["countryName"] = "Country Name can not empty";
    }
    if (empty($data['countryCode'])) {
        $validate["countryCode"] = "Country Code can not empty";
    }
    if (empty($validate)) {
        addCountry($data["countryId"], $data["countryName"], $data["countryCode"]);
        header("Location:listCountry.php");
    }

}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add country</title>
    <meta charset="UTF-8"/>
</head>
<style>
    #link:visited{
        color: blue;
    }
</style>
<body>
<h2>Add new country</h2>
<h3><a id="link" href="../country/listCountry.php">Go to list</a></h3>
<table>
    <form action="" method="post">
        <tr>
            <th>ID:</th>
            <td><input type="number" name="countryId"/>
                <?php echo empty($data['countryId']) ? $validate["countryId"] : ''; ?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="countryName"/>
                <?php echo empty($data['countryName']) ? $validate["countryName"] : ''; ?></td>
        </tr>
        <tr>
            <th>Code:</th>
            <td><input type="text" name="countryCode"/>
                <?php echo empty($data['countryCode']) ? $validate["countryCode"] : ''; ?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
            <td><input type="submit" value="Clear"/>
                <?php echo !empty($validate["existed"]) ? $validate["existed"] : ''; ?></td>
        </tr>
    </form>
</table>
</body>

</html>
