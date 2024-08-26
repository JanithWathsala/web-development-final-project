<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flight_booking";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address1 = $conn->real_escape_string($_POST['address1']);
    $address2 = $conn->real_escape_string($_POST['address2']);
    $city = $conn->real_escape_string($_POST['city']);
    $state = $conn->real_escape_string($_POST['state']);
    $postalCode = $conn->real_escape_string($_POST['postalCode']);
    $country = $conn->real_escape_string($_POST['country']);
    $birthYear = intval($_POST['birthYear']);
    $aboutYou = $conn->real_escape_string($_POST['aboutYou']);
    $consent = isset($_POST['consent']) ? 1 : 0;

    // Insert data into the database
    $sql = "INSERT INTO bookings (first_name, last_name, email, phone, address1, address2, city, state, postal_code, country, birth_year, about_you, consent)
            VALUES ('$firstName', '$lastName', '$email', '$phone', '$address1', '$address2', '$city', '$state', '$postalCode', '$country', '$birthYear', '$aboutYou', '$consent')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>";
        echo "alert('successfully');";
        echo "</script>";
    } else {
        echo "<script>";
        echo "alert('Error, Email alrady is signup');";
        echo "window.location='Book_a_Flight.html';";
        echo "</script>";
        
    }
}

$conn->close();
?>
