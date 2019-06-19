<?php
require "functionsCity.php";

$cities = getALlCities();
$data = array();
$validate = array();

if (!empty($_POST['submit'])) {
    foreach ($cities as $element) {
        if ($element["cityId"] == $_POST['cityId']) {
            $validate["existed"] = "This ID is existed!!";
        }
    }
    $data["countryId"] = !empty($_GET['countryId']) ? $_GET["countryId"] : '';
    $data["cityId"] = isset($_POST['cityId']) ? $_POST["cityId"] : '';
    $data["cityName"] = isset($_POST['cityName']) ? $_POST["cityName"] : '';
    $data["cityCode"] = isset($_POST['cityCode']) ? $_POST["cityCode"] : '';
    if (empty($data["countryId"])) {
        $validate["countryId"] = "Country Id Is Null";
        echo "<form method='get'> <input type='text' placeholder='Input country ID' name='countryId'/><input type='submit' value='submit'></form>";
    }
    if (empty($data["cityId"])) {
        $validate["cityId"] = "ID Can Not Empty";
    }
    if (empty($data["cityName"])) {
        $validate["cityName"] = "Name Can Not Empty";
    }
    if (empty($data["cityCode"])) {
        $validate["cityCode"] = "Code Can Not Empty";
    }

    if (empty($validate)) {
        addCity($data['countryId'], $data['cityId'], $data['cityName'], $data['cityCode']);
        header("Location:listCity.php?countryId=" . $_GET["countryId"]);
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Add city</title>
    <meta charset="UTF-8"/>
</head>
<style>
    #link:visited{
        color: blue;
    }
</style>
<body>
<h2>Add new city</h2>
<h3><a id="link" href="../city/listCity.php">Go to list</a></h3>
<table>
    <form action="" method="post">
        <tr>
            <th>ID:</th>
            <td><input type="number" name="cityId"/>
                <?php echo empty($data['cityId']) ? $validate["cityId"] : ''; ?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="cityName"/>
                <?php echo empty($data['cityName']) ? $validate["cityName"] : ''; ?></td>
        </tr>
        <tr>
            <th>Code:</th>
            <td><input type="text" name="cityCode"/>
                <?php echo empty($data['cityCode']) ? $validate["cityCode"] : ''; ?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
            <td><input type="submit" value="Clear"/>
                <?php echo !empty($validate["existed"]) ? $validate["existed"] : '';
                echo !empty($validate["countryId"]) ? $validate["countryId"] : ''; ?></td>

        </tr>
    </form>
</table>
</body>

</html>
