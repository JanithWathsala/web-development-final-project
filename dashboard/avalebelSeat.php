<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "astralflights"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to select data
$sql = "SELECT flight_name, flight_date, destination, available_seats FROM flights";
$result = $conn->query($sql);
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
                        <h2>Contact Details</h2>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <td>Flight_name</td>
                                <td>Flight_date</td>
                                <td>Destination</td>
                                <td>Avalable seats</td>
                            </tr>
                        </thead>
                        <?php
                            if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr><td>" . $row["flight_name"]. "</td><td>" .  $row["flight_date"]. "</td><td>" . $row["destination"]. "</td><td>" . $row["available_seats"]. "</td></tr>";

                            }
                            } else {
                            echo "<tr><td colspan='2'>No data found</td></tr>";
                            }
                            $conn->close();
                            ?>
                        <tbody>
                            
                        </tbody>
                    </table>
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