<?php
require "functionsDistrict.php";

$districts = showListDistrict($_GET["cityId"]);

if (!empty($_POST['showAllList'])) {
    header("Location:listDistrict.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>District List</title>
</head>
<style>
    #edit{
        text-decoration: none;
    }
    #edit:visited{
        color: black;
    }
    #link:visited{
        color: blue;
    }
</style>
<body>
<h1><?php echo !empty($_GET["cityName"]) ? $_GET["cityName"] : ''; ?> Districts List </h1>
<h3><a id="link" href="../city/listCity.php">Back To Cities List</a></h3>
<h3><a id="link" href="addDistrict.php?cityId=<?php echo !empty($_GET["cityId"])?$_GET["cityId"]:'';?>">Add New</a></h3>
<form method="get">
    <input type="text" placeholder="Search by city ID" name="cityId"/>
    <input type="submit" value="Search"/> <?php echo (!$districts)? 'City id does not exist or this city does not have districts yet!!!' : '';?>
</form>


<div class="list">
    <table>
        <tr>
            <th>ID</th>
            <th>District</th>
            <th>Code</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($districts as $element) { ?>
            <tr>
                <td><?php echo $element['districtId']; ?></td>
                <td><?php echo $element['districtName']; ?></td>
                <td><?php echo $element['districtCode']; ?></td>

                <td>
                    <form action="deleteDistrict.php?cityId=<?php echo $_GET['cityId'];?>" method="post">
                        <input type="hidden" value="<?php echo $element['districtId']; ?>" name="districtId"/>
                        <input onclick="return confirm('Are you sure delete this?');" type="submit" value="Delete"
                               name="delete"/>
                    </form>
                </td>
                <td>

                        <button><a id="edit"
                                href="../district/editDistrict.php?cityId=<?php echo $element["cityId"]?>&districtId=<?php echo $element["districtId"]?>">Edit</a>
                        </button>

                </td>
            </tr>
        <?php } ?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Show All District List" name="showAllList"/>
    </form>
</div>
</body>
</html>
