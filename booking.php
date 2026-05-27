//done by Md. Fazle Hasan

<?php 
include 'db.php';

$conn = new mysqli("localhost", "root", "", "AR");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$selectedFlight = null;
$error = '';
$success = false;
$booking_ref = '';
$total_price = 0;
$flight_data = null;
$passenger_name_saved = '';
$num_tickets_saved = 0;

if(isset($_GET['flight_id'])) {
    $flight_id = $_GET['flight_id'];
    $result = $conn->query("SELECT * FROM flights WHERE id = $flight_id");
    if($result && $result->num_rows > 0) {
        $selectedFlight = $result->fetch_assoc();
    }
}

$flightsResult = $conn->query("SELECT * FROM flights");

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['book_ticket'])) {
    $flight_id = $_POST['flight_id'];
    $passenger_name_saved = $_POST['passenger_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $num_tickets_saved = $_POST['num_tickets'];
    
    if($num_tickets_saved > 5) {
        $error = "You can only book maximum 5 tickets at once!";
    } else {
        $flight_query = $conn->query("SELECT * FROM flights WHERE id = $flight_id");
        $flight_data = $flight_query->fetch_assoc();
        
        if($num_tickets_saved > $flight_data['seats_available']) {
            $error = "Sorry, only " . $flight_data['seats_available'] . " seats available!";
        } else {
            $total_price = $flight_data['price'] * $num_tickets_saved;
            $booking_ref = "NX" . strtoupper(uniqid());
            
            // Insert booking
            $query = "INSERT INTO bookings (booking_ref, flight_id, passenger_name, passenger_email, passenger_phone, seats_booked, total_price) 
                      VALUES ('$booking_ref', $flight_id, '$passenger_name_saved', '$email', '$phone', $num_tickets_saved, $total_price)";
            
            if($conn->query($query)) {
                $new_seats = $flight_data['seats_available'] - $num_tickets_saved;
                $conn->query("UPDATE flights SET seats_available = $new_seats WHERE id = $flight_id");
                $success = true;
            } else {
                $error = "Booking failed. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Flight - Nexus Airways</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0a1428 0%, #03060f 100%);
            color: white;
        }
        
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(5, 10, 22, 0.95);
            padding: 1rem 2rem;
            z-index: 1000;
            border-bottom: 1px solid rgba(0, 224, 255, 0.2);
        }
        
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            background: linear-gradient(135deg, #FFFFFF, #00e0ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            text-decoration: none;
            transition: transform 0.3s;
            display: inline-block;
        }
        
        .logo:hover {
            transform: scale(1.05);
        }
        
        .logo i {
            margin-right: 10px;
        }
        
        .nav-links {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        
        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
            position: relative;
        }
        
        .nav-links a:hover {
            color: #00e0ff;
        }
        
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #00e0ff;
            transition: width 0.3s;
        }
        
        .nav-links a:hover::after {
            width: 100%;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 8rem 2rem 4rem;
        }
        
        .booking-card {
            background: rgba(18, 28, 48, 0.7);
            border-radius: 24px;
            padding: 2rem;
            border: 1px solid rgba(0,224,255,0.2);
            transition: all 0.3s;
            animation: fadeInUp 0.6s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,224,255,0.2);
        }
        
        .flight-info {
            background: rgba(0,0,0,0.3);
            padding: 1rem;
            border-radius: 16px;
            margin-bottom: 1.5rem;
            transition: all 0.3s;
        }
        
        .flight-info:hover {
            background: rgba(0,224,255,0.1);
            transform: scale(1.02);
        }
        
        .flight-info h3 {
            color: #00e0ff;
            margin-bottom: 0.5rem;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #b9c7dd;
            font-weight: 500;
        }
        
        .form-group input, .form-group select {
            width: 100%;
            padding: 12px;
            background: rgba(0,0,0,0.3);
            border: 1px solid rgba(0,224,255,0.3);
            border-radius: 12px;
            color: white;
            font-size: 1rem;
            transition: all 0.3s;
        }
        
        .form-group input:focus, .form-group select:focus {
            outline: none;
            border-color: #00e0ff;
            box-shadow: 0 0 10px rgba(0,224,255,0.3);
            transform: scale(1.02);
        }
        
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(95deg, #00e0ff, #0077ff);
            border: none;
            border-radius: 40px;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,224,255,0.4);
        }
        
        .error {
            background: rgba(255,0,0,0.2);
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1rem;
            border-left: 4px solid #ff4444;
            animation: shake 0.5s ease;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        
        .success {
            background: rgba(0,255,0,0.2);
            padding: 1.5rem;
            border-radius: 16px;
            text-align: center;
            border: 1px solid #00ff88;
            animation: pulse 0.5s ease;
        }
        
        @keyframes pulse {
            0% { transform: scale(0.95); opacity: 0; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .success h2 {
            color: #00ff88;
            margin-bottom: 1rem;
        }
        
        .ticket-limit {
            font-size: 0.8rem;
            color: #ffaa00;
            margin-top: 0.3rem;
        }
        
        footer {
            background: #050a14;
            padding: 2rem;
            text-align: center;
            margin-top: 2rem;
        }
        
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .nav-links {
                justify-content: center;
            }
            .container {
                padding: 6rem 1rem 2rem;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <a href="index.php" class="logo">
            <i class="fas fa-plane"></i> Nexus Airways
        </a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="search.php">Search Flights</a>
            <a href="booking.php">Book Ticket</a>
            <a href="about.php">About Us</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 style="text-align: center; margin-bottom: 2rem;">✈ Book Your Flight</h1>
    
    <?php if($error): ?>
        <div class="error"><?php echo $error; ?></div>
    <?php endif; ?>
    
    <?php if($success && $flight_data): ?>
        <div class="success">
            <i class="fas fa-check-circle" style="font-size: 3rem; color: #00ff88;"></i>
            <h2>Booking Confirmed!</h2>
            <p><strong>Booking Reference:</strong> <?php echo $booking_ref; ?></p>
            <p><strong>Flight:</strong> <?php echo $flight_data['origin']; ?> → <?php echo $flight_data['destination']; ?></p>
            <p><strong>Date:</strong> <?php echo $flight_data['departure_date']; ?></p>
            <p><strong>Passenger:</strong> <?php echo $passenger_name_saved; ?></p>
            <p><strong>Tickets:</strong> <?php echo $num_tickets_saved; ?></p>
            <p><strong>Total Price:</strong> $<?php echo number_format($total_price, 2); ?></p>
            <br>
            <a href="index.php" style="color: #00e0ff;">← Back to Home</a>
        </div>
    <?php else: ?>
    <div class="booking-card">
            <?php if($selectedFlight): ?>
            <div class="flight-info">
                <h3>Selected Flight</h3>
                <p><strong><?php echo $selectedFlight['origin']; ?> → <?php echo $selectedFlight['destination']; ?></strong></p>
                <p>Flight Number: <?php echo $selectedFlight['flight_number']; ?></p>
                <p>Date: <?php echo $selectedFlight['departure_date']; ?></p>
                <p>Time: <?php echo $selectedFlight['departure_time']; ?></p>
                <p>Price per ticket: $<?php echo $selectedFlight['price']; ?></p>
                <p>Available Seats: <?php echo $selectedFlight['seats_available']; ?></p>
            </div>
            <?php endif; ?>
            
            <form method="POST" action="booking.php" id="bookingForm" onsubmit="return validateBookingForm()">
                <div class="form-group">
                    <label><i class="fas fa-plane"></i> Select Flight</label>
                    <select name="flight_id" id="flight_id" required>
                        <option value="">-- Choose a flight --</option>
                        <?php 
                        $flightsResult = $conn->query("SELECT * FROM flights");
                        while($flight = $flightsResult->fetch_assoc()): 
                        ?>
                            <option value="<?php echo $flight['id']; ?>" <?php echo ($selectedFlight && $selectedFlight['id'] == $flight['id']) ? 'selected' : ''; ?>>
                                <?php echo $flight['origin']; ?> → <?php echo $flight['destination']; ?> | <?php echo $flight['departure_date']; ?> | $<?php echo $flight['price']; ?>
                            </option>
                        <?php endwhile; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-user"></i> Passenger Name</label>
                    <input type="text" name="passenger_name" id="passenger_name" required placeholder="Enter your full name">
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email Address</label>
                    <input type="email" name="email" id="email" required placeholder="your@email.com">
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-phone"></i> Contact Number</label>
                    <input type="text" name="phone" id="phone" required placeholder="+1234567890">
        </div>
                
                <div class="form-group">
                    <label><i class="fas fa-ticket-alt"></i> Number of Tickets (Max 5)</label>
                    <input type="number" name="num_tickets" id="num_tickets" min="1" max="5" value="1" required>
                    <div class="ticket-limit">
                        <i class="fas fa-info-circle"></i> You can book up to 5 tickets per booking
                    </div>
                </div>
                
        <button type="submit" name="book_ticket" class="btn-submit">Confirm Booking →</button>
            </form>
        </div>
    <?php endif; ?>
</div>

<footer>
    <p>© 2025 Nexus Airways — Elevating Air Travel Through Intelligent Systems</p>
</footer>

<script>
    setTimeout(function() {
    alert("✈️ Welcome to Nexus Airways Booking System! Please fill in your details to book a flight.");
}, 500);
    
    // Validate booking form
    function validateBookingForm() {
        var flight = document.getElementById('flight_id').value;
        var name = document.getElementById('passenger_name').value;
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;
        var tickets = document.getElementById('num_tickets').value;
        
        if(flight == "") {
            alert("⚠️ Please select a flight to book!");
            return false;
        }
        
        if(name == "") {
            alert("⚠️ Please enter your full name!");
            return false;
        }
        
        if(name.length < 3) {
            alert("⚠️ Please enter a valid name (at least 3 characters)!");
            return false;
        }
        
        if(email == "") {
            alert("⚠️ Please enter your email address!");
            return false;
        }
        
        if(!email.includes('@') || !email.includes('.')) {
            alert("⚠️ Please enter a valid email address!");
            return false;
        }
        
        if(phone == "") {
            alert("⚠️ Please enter your contact number!");
            return false;
        }
        
        if(tickets < 1 || tickets > 5) {
            alert("⚠️ Please enter a valid number of tickets (1 to 5)!");
            return false;
        }
        
        alert("✓ Booking details validated!\n\nPassenger: " + name + "\nTickets: " + tickets + "\n\nYou will now be redirected to confirm your booking.");
        
        return true;
    }
    
    document.getElementById('num_tickets').addEventListener('change', function() {
        var val = parseInt(this.value);
        if(val > 5) {
            alert("⚠️ Maximum 5 tickets allowed per booking!");
            this.value = 5;
        }
        if(val < 1) {
            this.value = 1;
        }
    });
    
    document.getElementById('phone').addEventListener('input', function() {
        var phone = this.value;
        if(phone.length > 0 && phone.length < 10) {
            this.style.borderColor = "#ffaa00";
        } else if(phone.length >= 10) {
            this.style.borderColor = "#00ff88";
        } else {
            this.style.borderColor = "rgba(0,224,255,0.3)";
        }
    });
    
    document.getElementById('email').addEventListener('input', function() {
        var email = this.value;
        if(email.includes('@') && email.includes('.')) {
            this.style.borderColor = "#00ff88";
        } else if(email.length > 0) {
            this.style.borderColor = "#ffaa00";
        } else {
            this.style.borderColor = "rgba(0,224,255,0.3)";
        }
    });
</script>

</body>
</html>