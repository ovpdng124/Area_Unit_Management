<!DOCTYPE html>
<?php
require "functionsCountry.php";
$countries = getAllCountries();


if (isset($_POST['destroy'])) {
    session_destroy();
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Country List</title>
</head>
<style>

    #edit,#city{
        color: black;
        text-decoration: none;
    }
    #edit,#city:visited{
        color: black;
    }
    #link:visited{
        color: blue;
    }
</style>
<body>
<h1>Country List</h1>
<h3><a id="link" href="addCountry.php">Add new</a></h3>


<div class="list">
    <table>
        <tr>
            <th>ID</th>
            <th>Country</th>
            <th>Code</th>
            <th>City</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        <?php foreach ($countries as $element) { ?>
            <tr>
                <td><?php echo $element['countryId']; ?></td>
                <td><?php echo $element['countryName']; ?></td>
                <td><?php echo $element['countryCode']; ?></td>
                <td>
                    <button name="city"><a id="city"
                                href="../city/listCity.php?countryId=<?php echo $element['countryId'] ?>&countryName=<?php echo $element['countryName']?>">City</a>
                    </button>
                </td>
                <td>
                    <form action="deleteCountry.php" method="post">
                        <input type="hidden" value="<?php echo $element['countryId']; ?>" name="countryId"/>
                        <input onclick="return confirm('Are you sure delete this?');" type="submit" value="Delete"
                               name="delete"/>
                    </form>
                </td>
                <td>
                    <button type="submit" name="edit"><a id="edit"
                                href="../country/editCountry.php?countryId=<?php echo $element['countryId'] ?>">Edit</a>
                    </button>
                </td>
            </tr>
        <?php } ?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Destroy All" name="destroy"/>
    </form>
</div>
</body>
</html>
