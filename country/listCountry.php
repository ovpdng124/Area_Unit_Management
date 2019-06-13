<!DOCTYPE html>
<?php
require "functionsCountry.php";
$countries = getAllCountries();


if (isset($_POST['destroy'])) {
    session_destroy();
}
if (!empty($_POST['edit'])) {
    header("Location:editCountry.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Country List</title>
</head>
<body>
<h1>Country List</h1>
<h3><a href="addCountry.php">Add new</a></h3>



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
                        <button name="edit"><a
                                    href="../city/listCity.php">City</a>
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
                    <form action="editCountry.php" method="post">
                        <button type="submit" name="edit"><a
                                    href="editCountry.php?countryId=<?php echo $element['countryId'] ?>">Edit</a>
                        </button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
    <form action="" method="post">
        <input type="submit" value="Destroy" name="destroy"/>
    </form>
</div>
</body>
</html>

