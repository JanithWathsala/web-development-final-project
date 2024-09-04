<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $conn = new mysqli('localhost', 'root', '', 'astralflights');

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO email_subscriptions (email) VALUES ('$email')";

        if ($conn->query($sql) === TRUE) {
            echo"<script>" ;
            echo "window.location = 'subscribe_successfull.html';";
            echo "</script>" ;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        echo"<script>" ;
        echo "alert('No email provider');";
        echo "</script>" ;
    }
}
?>
