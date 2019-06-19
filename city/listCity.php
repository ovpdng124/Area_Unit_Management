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
<style>
    #edit, #district {
        color: black;
        text-decoration: none;
    }

    #edit, #district:visited {
        color: black;
    }

    #link:visited {
        color: blue;
    }
</style>
<body>
<h1><?php echo !empty($_GET["countryName"]) ? $_GET["countryName"] : ''; ?> Cities List </h1>
<h3><a id="link" href="../country/listCountry.php">Back To Countries List</a></h3>
<h3><a id="link" href="addCity.php?countryId=<?php echo !empty($_GET["countryId"]) ? $_GET["countryId"] : ''; ?>">Add
        New</a></h3>
<form method="get">
    <input type="text" placeholder="Search by country ID" name="countryId"/>
    <input type="submit" value="Search"/> <?php echo (!$cities)? 'Country id does not exist or this country does not have cities yet!!!' : '';?>
</form>



<div class="list">
    <table>
        <tr>
            <th>CountryId</th>
            <th>ID</th>
            <th>City</th>
            <th>Code</th>
            <th>District</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($cities as $element) { ?>
            <tr>
                <td><?php echo $element["countryId"]; ?></td>
                <td><?php echo $element['cityId']; ?></td>
                <td><?php echo $element['cityName']; ?></td>
                <td><?php echo $element['cityCode']; ?></td>
                <td>
                    <button name="district"><a id="district"
                                               href="../district/listDistrict.php?cityId=<?php echo $element['cityId'] ?>&cityName=<?php echo $element['cityName'] ?>">District</a>
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
                    <button type="submit" name="edit"><a id="edit"
                                                         href="../city/editCity.php?cityId=<?php echo $element["cityId"] ?>&countryId=<?php echo $element["countryId"] ?>">Edit</a>
                    </button>
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
