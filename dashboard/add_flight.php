<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $flight_name = $_POST['flight_name'];
    $flight_date = $_POST['flight_date'];
    $destination = $_POST['destination'];
    $available_seats = $_POST['available_seats'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'astralflights');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert flight data into the flights table
    $sql = "INSERT INTO flights (flight_name,flight_date,destination, available_seats) VALUES ('$flight_name','$flight_date','$destination', $available_seats )";

    if ($conn->query($sql) === TRUE) {
        echo"<script>" ;
        echo "alert('Flight Add Sucessfully')";
        echo "</script>" ;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                        <img src="./imges/4.png" style="width: 60px;" alt="">
                        </span>
                        <span class="title">Astral Flights</span>
                    </a>
                </li>

                <li>
                    <a href="bookings-main.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">New Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="massages.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Contact Details</span>
                    </a>
                </li>
                <li>
                    <a href="./add_flight.php">
                        <span class="icon">
                        <img src="./imges/flight_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">Flight Add</span>
                    </a>
                </li>
                <li>
                    <a href="./get_subcription.php">
                        <span class="icon">
                            <img src="./imges/sub_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">subscription</span>
                    </a>
                </li>
                <li>
                    <a href="./avalebelSeat.php">
                        <span class="icon">
                            <img src="./imges/flight_icon.jpg" style="width: 40px;" alt="">
                        </span>
                        <span class="title">Available Flight</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
            <div class="toggle">
                   <ion-icon name="menu-outline"></ion-icon>
                </div>


                <div class="user">
                    
                </div>
            </div>
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>FLIGHT ADD</h2>
                    </div>
                    <form action="add_flight.php" method="post">
                        <div class="form-group">
                            <label for="flight_name">Flight Name:</label>
                            <input type="text" id="flight_name" name="flight_name" required>
                        </div>
                        <div class="form-group">
                            <label for="flight_date">Flight Date:</label>
                            <input type="text" id="flight_date" name="flight_date" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination:</label>
                            <input type="text" id="destination" name="destination" required>
                        </div>
                        <div class="form-group">
                            <label for="available_seats">Available Seats:</label>
                            <input type="number" id="available_seats" name="available_seats" required>
                        </div>
                        <button type="submit">Add Flight</button>         
                    </form>
                    
                    
                </div>             
            </div> 
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>

    <script>
        const userDiv = document.querySelector('.user');

        userDiv.addEventListener('click', function() {
        window.location.href = "logout.php";
        });
    </script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>