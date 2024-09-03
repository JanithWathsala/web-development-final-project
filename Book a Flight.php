<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fly to Space</title>
    
    <link rel="stylesheet" href="./css/all.css">
    <link rel="stylesheet" href="./css/Book a Flight.css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
     <!--navigation-->
     <section class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="./images/Rocket.mp4" type="video/mp4">
        </video>
        <div class="overlay">
            <div class="navbar">
                <ul>
                    <li><a href="homepage.html">Home</a></li>
                    <li><a href="./Book a Flight.php">Book a flight</a></li>
                    <li><a href="./destination.html">Destination</a></li>
                    <li><a href="./fleet.html">Fleet</a></li>  
                    <li><a href="./Offer.html">Offers</a></li>
                </ul>
            </div>
        </div>
        <!-- Card Section -->
                <!-- Table Section -->
                <h1>Book your flight<br> now</h1>
                <h2>Next Ride</h2>
                <div class="next-ride-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Flight Date</th>
                                <th>Destination</th>
                                <th>Flight Name</th>
                                <th>Available Seats</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = new mysqli('localhost', 'root', '', 'astralflights');
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
        
                            $sql = "SELECT flight_date, destination, flight_name, available_seats FROM flights ORDER BY flight_date ASC, destination ASC, flight_name ASC, available_seats ASC";
                            $result = $conn->query($sql);
        
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo '<tr>';
                                    echo '<td>' . $row["flight_date"] . '</td>';
                                    echo '<td>' . $row["destination"] . '</td>';
                                    echo '<td>' . $row["flight_name"] . '</td>';
                                    echo '<td>' . $row["available_seats"] . '</td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="4">No flights available.</td></tr>';
                            }
        
                            $conn->close();
                            ?>
                        </tbody>
                    </table>
                    <a href="./Book_a_Flight.php" class="cta-button">BOOK FLIGHT</a>
                </div>
                
    </section>
    <!--fotter-->
<div>
    <div class="social-media-links">
        <h3>Follow Us ON</h3>
        <a href="https://www.facebook.com" ><img src="./images/facebook.png" alt="Facebook"></a>
        <a href="https://www.twitter.com" ><img src="./images/twitter.png" alt="Twitter"></a>
        <a href="https://www.instagram.com" ><img src="./images/linkedin.png" alt="linkedin"></a>
        <a href="https://www.linkedin.com" ><img src="./images/youtube.png" alt="Youtube"></a>
    </div>
</div>

<footer>
    <div class="footer-content">
        <div class="footer-section">
            
            <a href="./about01.html">About Us</a>
            <a href="#">FAQ</a>
            <a href="#">Support</a>
            <a href="./contactus.html">Contact</a>
        </div>
        <div class="footer-section">
            <h2>Subscribe</h2>
            <p>Sign up to receive updates on Astral Flights' announcements, launches, and opportunities.</p>
            <form action="./subscription.php" method="post">
                <input type="email" id="email" name="email" placeholder="Email" required>
                <label class="consent">
                    <input type="checkbox" required>
                    Please click to confirm your consent to receive email updates from us.
                </label>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2007 - 2024 ASTRAL FLIGHTS, ALL RIGHTS RESERVED
        <br>
        <a href="./privacy policy.html">Privacy Policy</a> | <a href="./Terms of use.html">Terms Of Use</a>
    </div>
</footer>    
</body>
</html>
        
        <!------------------------------------------------------------------>