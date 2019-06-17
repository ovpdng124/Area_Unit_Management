<?php
require "functionsCity.php";

$cities = showListCity($_GET["countryId"]);

if (!empty($_POST['showAllList'])) {
    header("Location:listCity.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>City List</title>
</head>
<body>
<h1>City List</h1>
<h3><a href="../country/listCountry.php">Back To Country List</a></h3>
<h3><a href="addCity.php?countryId=<?php echo !empty($_GET["countryId"])?$_GET["countryId"]:'';?>">Add New</a></h3>


<div class="list">
    <table>
        <tr>
<!--            <th>CountryId</th>-->
            <th>ID</th>
            <th>City</th>
            <th>Code</th>
            <th>District</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($cities as $element) { ?>
            <tr>
<!--                <td>--><?php //echo $element["countryId"];?><!--</td>-->
                <td><?php echo $element['cityId']; ?></td>
                <td><?php echo $element['cityName']; ?></td>
                <td><?php echo $element['cityCode']; ?></td>
                <td>
                    <button name="district"><a
                                href="../city/listCity.php">District</a>
                    </button>
                </td>
                <td>
                    <form action="deleteCity.php" method="post">
                        <input type="hidden" value="<?php echo $element['cityId']; ?>" name="cityId"/>
                        <input onclick="return confirm('Are you sure delete this?');" type="submit" value="Delete"
                               name="delete"/>
                    </form>
                </td>
                <td>
                    <form action="editCity.php" method="post">
                        <button type="submit" name="edit"><a
                                    href="editCity.php?cityId=<?php echo $element["cityId"]?>&countryId=<?php echo $element["countryId"]?>">Edit</a>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Show All City List" name="showAllList"/>
    </form>
</div>
</body>
</html>
