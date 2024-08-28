<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $coname = $_POST['coname'];
    $message = $_POST['message'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'astralflights');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert contact data into the contact_messages table
    $sql = "INSERT INTO contact_messages (name, email, phone, company_name, message) VALUES ('$name', '$email', '$phone', '$coname', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "New message added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
