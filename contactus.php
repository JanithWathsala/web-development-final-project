<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $coname = $_POST['coname'];
    $message = $_POST['message'];

    
    $conn = new mysqli('localhost', 'root', '', 'astralflights');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO contact_messages (name, email, phone, company_name, message) VALUES ('$name', '$email', '$phone', '$coname', '$message')";

    if ($conn->query($sql) === TRUE) {
       echo"<script>" ;
       echo "window.location = 'contact_sucessful.html';";
       echo "</script>" ;
    } 
    else {
       echo"<script>" ;
       echo "alert('Error');";
       echo "window.location = 'contact_sucessful.html';";
       echo "</script>" ;
    }

    $conn->close();
}
?>
