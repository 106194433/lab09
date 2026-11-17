<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Cars</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Used Car Dealership</h1>
    <h2>Search for a Car</h2>

    <form action="search_result.php" method="get">
        <label for="model">Enter Car Model:</label>
        <input type="text" id="model" name="model" required>

        <input type="submit" value="Search">
    </form>

    <p><a href="cars.php">View All Cars</a></p>

</body>
</html>