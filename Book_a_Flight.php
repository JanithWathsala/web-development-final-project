<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fly to Space</title>
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/all.css">
</head>
<body>
    
    <section class="video-container">
        <video autoplay muted loop id="background-video">
            <source src="./images/Rocket.mp4" type="video/mp4">
        </video>
        <div class="overlay">
            <div class="navbar">
            <img src="./images/logo.png" alt="">
                <ul>
                    <li><a href="homepage.html">Home</a></li>
                    <li><a href="./Book_a_Flight.php">Book a flight</a></li>
                    <li><a href="./destination.html">Destination</a></li>
                    <li><a href="./fleet.html">Fleet</a></li>  
                    <li><a href="./Offer.html">Offers</a></li>

                </ul>
            </div>
            <div class="heading">
                <h1>BOOK YOUR<br>FLIGHT NOW</h1>
                <h2>Book your rocket quickly to get a unique difference</h2>
            </div>
        </div>
    </section>
    <!--form section-->
    <div class="bf-form-section">
        <div class="bf-form-overlay"></div>
        <div class="bf-form-container">
            <h2>Contact Details</h2>
            <p>* indicates a required field</p>
            <form action="submit_booking.php" method="post">
                <div class="bf-form-row">

                    <div class="bf-form-group">
                        <label for="firstName">Select Flight *</label>
                        <select name="flight_id" id="flight">                          
                            <?php 
                            // Connect to the database
                            $conn = new mysqli('localhost', 'root', '', 'astralflights');
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                
                            // Fetch available flights
                            $sql = "SELECT id, flight_name, available_seats FROM flights  WHERE available_seats >= 0";
                            $result = $conn->query($sql);
                
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['id']."'>".$row['flight_nams']." (Available Seats: ".$row['available_seats'].")</option>";
                                }
                            } else {
                                echo "<option>No flights available</option>";
                            }
                
                            $conn->close();
                            ?>        
                            
            
                        </select>
                    </div>
                    <div class="bf-form-group">
                        <label for="lastName">Seats to Book *</label>
                        <input type="number" name="seats_to_book" id="seats_to_book" required>
                    </div>
                </div>

                <div class="bf-form-row">
                    <div class="bf-form-group">
                        <label for="firstName">First Name *</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="bf-form-group">
                        <label for="lastName">Last Name *</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                </div>
                <div class="bf-form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="bf-form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="bf-form-group">
                    <label for="address1">Address 1 *</label>
                    <input type="text" id="address1" name="address1" required>
                </div>
                <div class="bf-form-group">
                    <label for="address2">Address 2</label>
                    <input type="text" id="address2" name="address2">
                </div>
                <div class="bf-form-row">
                    <div class="bf-form-group">
                        <label for="city">City *</label>
                        <input type="text" id="city" name="city" required>
                    </div>
                    <div class="bf-form-group">
                        <label for="state">State/Province *</label>
                        <input type="text" id="state" name="state" required>
                    </div>
                </div>
                <div class="bf-form-row">
                    <div class="bf-form-group">
                        <label for="postalCode">Zip/Postal Code *</label>
                        <input type="text" id="postalCode" name="postalCode" required>
                    </div>
                    <div class="bf-form-group">
                        <label for="country">Country *</label>
                        <input type="text" id="country" name="country" required>
                    </div>
                </div>
                <div class="bf-form-group">
                    <label for="birthYear">Year of Birth *</label>
                    <input type="number" id="birthYear" name="birthYear" required>
                </div>
                <p>Due to federal regulation, you must be 18 years old or older to fly with us</p>
                <div class="bf-form-group">
                    <label for="aboutYou">Tell Us About You</label>
                    <textarea id="aboutYou" name="aboutYou" rows="4" maxlength="500"></textarea>
                </div>
                
                <!-- New Consent Section -->
                <div class="bf-consent-section">
                    <input type="checkbox" id="consent" name="consent">
                    <label for="consent">
                        Please click to confirm your consent to our <a href="#">Privacy Policy</a>. Note - you have the right to withdraw your consent at any time by contacting us at <a href="mailto:privacy@astralflights.com">privacy@astralflights.com</a>. Please review our <a href="#">privacy policy</a> for more information on how we process your data. Filling out this form does not guarantee you a seat on a future New Shepard flight.
                    </label>
                </div>
                
                <input type="submit" value="Book Now" <?php if ($result->num_rows == 0) echo 'disabled'; ?>   >
                <!--<button type="submit">Submit</button>-->
            </form>
        </div>
    </div>
    <div class="social-media-links">
        <h3>Follow Us ON</h3>
        <a href="https://www.facebook.com" ><img src="./images/facebook.png" alt="Facebook"></a>
        <a href="https://www.twitter.com" ><img src="./images/twitter.png" alt="Twitter"></a>
        <a href="https://www.instagram.com" ><img src="./images/linkedin.png" alt="linkedin"></a>
        <a href="https://www.linkedin.com" ><img src="./images/youtube.png" alt="Youtube"></a>
    </div>


    <!-- Footer Section -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">        
                <a href="./about01.html">About Us</a>
                <a href="./faq.html">FAQ</a>
                <a href="./support.html">Support</a>
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
