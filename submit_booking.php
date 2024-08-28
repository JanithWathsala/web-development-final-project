<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astralflights";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$flight_id = $_POST['flight_id'];
$seats_to_book = $_POST['seats_to_book'];
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$postal_code = $_POST['postalCode'];
$country = $_POST['country'];
$birth_year = $_POST['birthYear'];
$about_you = $_POST['aboutYou'];
$consent = isset($_POST['consent']) ? 1 : 0;

// Check available seats
$check_seats_sql = "SELECT available_seats FROM flights WHERE id = $flight_id";
$check_seats_result = $conn->query($check_seats_sql);

if ($check_seats_result->num_rows > 0) {
    $row = $check_seats_result->fetch_assoc();
    $available_seats = $row['available_seats'];

    if ($seats_to_book <= $available_seats) {
        // Insert booking data into the database
        $sql = "INSERT INTO bookings (flight_id, seats_to_book, first_name, last_name, email, phone, address1, address2, city, state, postal_code, country, birth_year, about_you, consent)
        VALUES ('$flight_id', '$seats_to_book', '$first_name', '$last_name', '$email', '$phone', '$address1', '$address2', '$city', '$state', '$postal_code', '$country', '$birth_year', '$about_you', '$consent')";

        if ($conn->query($sql) === TRUE) {
            // Update available seats in the flights table
            $update_seats_sql = "UPDATE flights SET available_seats = available_seats - $seats_to_book WHERE id = $flight_id";
            $conn->query($update_seats_sql);

            echo "Booking submitted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error: Not enough available seats for this booking.";
    }
} else {
    echo "Error: Flight not found.";
}

$conn->close();
?>
