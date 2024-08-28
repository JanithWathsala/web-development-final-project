<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the email field is set
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Database connection
        $conn = new mysqli('localhost', 'root', '', 'astralflights');

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert email into the subscribers table
        $sql = "INSERT INTO email_subscriptions (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo "Subscribed successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the connection
        $conn->close();
    } else {
        echo "No email provided!";
    }
}
?>
