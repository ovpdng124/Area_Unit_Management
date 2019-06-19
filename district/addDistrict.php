<?php
require "functionsDistrict.php";

$districts = getAllDistricts();
$data = array();
$validate = array();

if (!empty($_POST['submit'])) {
    foreach ($districts as $element) {
        if ($element["districtId"] == $_POST['districtId']) {
            $validate["existed"] = "This ID is existed!!";
        }
    }
    $data["cityId"] = !empty($_GET['cityId']) ? $_GET["cityId"] : '';
    $data["districtId"] = isset($_POST['districtId']) ? $_POST["districtId"] : '';
    $data["districtName"] = isset($_POST['districtName']) ? $_POST["districtName"] : '';
    $data["districtCode"] = isset($_POST['districtCode']) ? $_POST["districtCode"] : '';
    if (empty($data["cityId"])) {
        $validate["cityId"] = "City Id Is Null";
        echo "<form method='get'> <input type='text' placeholder='Input City ID' name='cityId'/><input type='submit' value='submit'></form>";
    }
    if (empty($data["districtId"])) {
        $validate["districtId"] = "ID Can Not Empty";
    }
    if (empty($data["districtName"])) {
        $validate["districtName"] = "Name Can Not Empty";
    }
    if (empty($data["districtCode"])) {
        $validate["districtCode"] = "Code Can Not Empty";
    }

    if (empty($validate)) {
        addDistrict($data['cityId'], $data['districtId'], $data['districtName'], $data['districtCode']);
        header("Location:listDistrict.php?cityId=".$_GET["cityId"]);
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Add District</title>
    <meta charset="UTF-8"/>
</head>
<style>
    #link:visited{
        color: blue;
    }
</style>
<body>
<h2>Add new district</h2>
<h3><a id="link" href="../district/listDistrict.php">Go to list</a></h3>
<table>
    <form action="" method="post">
        <tr>
            <th>ID:</th>
            <td><input type="number" name="districtId"/>
                <?php echo empty($data['districtId']) ? $validate["districtId"] : ''; ?></td>
        </tr>
        <tr>
            <th>Name:</th>
            <td><input type="text" name="districtName"/>
                <?php echo empty($data['districtName']) ? $validate["districtName"] : ''; ?></td>
        </tr>
        <tr>
            <th>Code:</th>
            <td><input type="text" name="districtCode"/>
                <?php echo empty($data['districtCode']) ? $validate["districtCode"] : ''; ?></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="Submit"/></td>
            <td><input type="submit" value="Clear"/>
                <?php echo !empty($validate["existed"]) ? $validate["existed"] : '';
                echo !empty($validate["cityId"]) ? $validate["cityId"] : ''; ?></td>

        </tr>
    </form>
</table>
</body>

</html>
