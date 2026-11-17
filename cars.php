<?php
require_once("settings.php");

$sql = "SELECT * FROM cars";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Used Car Dealership</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Used Car Dealership</h1>
    <h2>Available Cars</h2>

    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Make</th>";
        echo "<th>Model</th>";
        echo "<th>Price</th>";
        echo "<th>Year</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['car_id'] . "</td>";
            echo "<td>" . htmlspecialchars($row['make']) . "</td>";
            echo "<td>" . htmlspecialchars($row['model']) . "</td>";
            echo "<td>$" . number_format($row['price'], 2) . "</td>";
            echo "<td>" . $row['yom'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p>There are no cars to display.</p>";
    }

    mysqli_close($conn);
    ?>

    <p><a href="search_form.php">Search for a Car</a></p>

</body>
</html>
