<?php
require_once("settings.php");

$model = "";
$result = false;

if (isset($_GET['model'])) {
    $model = trim($_GET['model']);

    if ($model !== "") {
        $sql = "SELECT * FROM cars WHERE model LIKE ?";
        $stmt = mysqli_prepare($conn, $sql);

        $search = "%" . $model . "%";
        mysqli_stmt_bind_param($stmt, "s", $search);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Search Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Used Car Dealership</h1>
    <h2>Search Results</h2>

    <?php
    if ($model === "") {
        echo "<p>Please enter a model to search.</p>";
    } elseif ($result && mysqli_num_rows($result) > 0) {
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
        echo "<p>No matching cars found.</p>";
    }

    if (isset($stmt)) {
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
    ?>

    <p><a href="search_form.php">Search Again</a></p>
    <p><a href="cars.php">View All Cars</a></p>

</body>
</html>