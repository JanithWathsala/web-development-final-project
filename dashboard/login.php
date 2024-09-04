<?php
    include('connection.php');
    if (isset($_POST['submit'])) {
        $username = $_POST['email'];
        $password = $_POST['pass'];

        $sql = "select * from admins where email = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        
        if($count == 1){  
            header("Location: bookings-main.php");
        }  
        else{  
            echo  "<script>";
            echo  "alert('Login failed. Invalid username or password!!');";
            echo "window.location = 'index.html';";
            echo "</script>";
        }     
    }
    ?>