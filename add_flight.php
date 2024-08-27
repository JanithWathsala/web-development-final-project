<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flight_name = $_POST['flight_name'];
    $available_seats = $_POST['available_seats'];
    $flight_image = $_POST['flight_image'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'astralflights');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert flight data into the flights table
    $sql = "INSERT INTO flights (flight_name, available_seats, flight_image) VALUES ('$flight_name', $available_seats, '$flight_image')";

    if ($conn->query($sql) === TRUE) {
        echo "New flight added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Flight</title>
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="container">
        <h1>Add New Flight</h1>
        <form action="add_flight.php" method="post">
            <div class="form-group">
                <label for="flight_name">Flight Name:</label>
                <input type="text" id="flight_name" name="flight_name" required>
            </div>
            <div class="form-group">
                <label for="available_seats">Available Seats:</label>
                <input type="number" id="available_seats" name="available_seats" required>
            </div>
            <button type="submit">Add Flight</button>
        </form>
    </div>
</body>
</html>
