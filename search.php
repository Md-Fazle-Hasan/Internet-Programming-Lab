//done by Tahmina Tuly
<?php 
include 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Flights - Nexus Airways</title>
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
            max-width: 1200px;
            margin: 0 auto;
            padding: 8rem 2rem 4rem;
        }
        
        .search-box {
            background: rgba(18, 28, 48, 0.7);
            border-radius: 24px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .search-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,224,255,0.2);
        }
        
        .search-box input {
            padding: 12px 20px;
            width: 300px;
            border: none;
            border-radius: 40px;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .search-box input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0,224,255,0.5);
            transform: scale(1.02);
        }
        
        .search-box button {
            padding: 12px 25px;
            background: linear-gradient(95deg, #00e0ff, #0077ff);
            border: none;
            border-radius: 40px;
            color: white;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .search-box button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0,224,255,0.4);
        }
        
        .flight-card {
            background: rgba(18, 28, 48, 0.7);
            border-radius: 24px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
            transition: all 0.3s;
        }
        
        .flight-card:hover {
            transform: translateX(10px);
            border-left: 3px solid #00e0ff;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        }
        
        .flight-price {
            color: #00e0ff;
            font-size: 1.5rem;
            font-weight: 700;
        }
        
        .btn-book {
            background: transparent;
            border: 1px solid #00e0ff;
            padding: 8px 20px;
            border-radius: 40px;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .btn-book:hover {
            background: #00e0ff;
            color: #0a0f1a;
            transform: scale(1.05);
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
            .search-box input {
                width: 100%;
                margin-bottom: 10px;
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
    <h1 style="text-align: center; margin-bottom: 2rem;">Search Flights</h1>
    
    <div class="search-box">
        <form method="GET" action="search.php" id="searchForm">
            <input type="text" name="destination" id="destination" placeholder="Enter destination (London, Paris, Tokyo...)" required>
            <button type="submit" name="search" onclick="return validateSearch()">Search →</button>
        </form>
    </div>
    
    <?php
    if(isset($_GET['search']) && $_GET['destination'] != "") {
        $dest = $_GET['destination'];
        
    $sql = "SELECT * FROM flights WHERE destination LIKE '%$dest%'";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            echo "<h2 style='margin-bottom: 1rem;'>Results for: " . $dest . "</h2>";
            
            
            while($row = mysqli_fetch_row($result)) {
                $flight_id = $row[0];
                $flight_origin = $row[2];
                $flight_destination = $row[3];
                $flight_date = $row[4];
                $flight_time = $row[5];
                $flight_price = $row[6];
                $flight_seats = $row[7];
                ?>
                <div class="flight-card">
                    <div>
                        <h3><?php echo $flight_origin; ?> → <?php echo $flight_destination; ?></h3>
                        <p><i class="fas fa-calendar"></i> Date: <?php echo $flight_date; ?></p>
                        <p><i class="fas fa-clock"></i> Time: <?php echo $flight_time; ?></p>
                        <p><i class="fas fa-chair"></i> Seats available: <?php echo $flight_seats; ?></p>
                    </div>
                    <div>
                        <div class="flight-price">$<?php echo $flight_price; ?></div>
                        <a href="booking.php?flight_id=<?php echo $flight_id; ?>" class="btn-book" onclick="showBookAlert('<?php echo $flight_origin; ?>', '<?php echo $flight_destination; ?>')">Book Now →</a>
                    </div>
            </div>
                <?php
            }
        } else {
            echo "<p style='text-align: center; padding: 2rem;'>No flights found to <strong>" . $dest . "</strong>. Try a different destination.</p>";
        }
    } else {
        $sql = "SELECT * FROM flights LIMIT 5";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            echo "<h2 style='margin-bottom: 1rem;'>Available Flights</h2>";
            
            while($row = mysqli_fetch_row($result)) {
                $flight_id = $row[0];
                $flight_origin = $row[2];
                $flight_destination = $row[3];
                $flight_date = $row[4];
                $flight_time = $row[5];
                $flight_price = $row[6];
                $flight_seats = $row[7];
                ?>
                <div class="flight-card">
                    <div>
                        <h3><?php echo $flight_origin; ?> → <?php echo $flight_destination; ?></h3>
                        <p><i class="fas fa-calendar"></i> Date: <?php echo $flight_date; ?></p>
                        <p><i class="fas fa-clock"></i> Time: <?php echo $flight_time; ?></p>
                        <p><i class="fas fa-chair"></i> Seats available: <?php echo $flight_seats; ?></p>
            </div>
                    <div>
                        <div class="flight-price">$<?php echo $flight_price; ?></div>
                        <a href="booking.php?flight_id=<?php echo $flight_id; ?>" class="btn-book" onclick="showBookAlert('<?php echo $flight_origin; ?>', '<?php echo $flight_destination; ?>')">Book Now →</a>
                </div>
                </div>
                <?php
            }
        }
    }
    ?>
</div>

<footer>
    <p>© 2025 Nexus Airways — Elevating Air Travel Through Intelligent Systems</p>
</footer>

<script>
    setTimeout(function() {
        alert("✈️ Welcome to Nexus Airways! Find your perfect flight today.");
    }, 500);
    
    function validateSearch() {
        var destination = document.getElementById('destination').value;
        if(destination == "") {
            alert("⚠️ Please enter a destination to search for flights!");
            return false;
        }
        if(destination.length < 2) {
            alert("⚠️ Please enter at least 2 characters to search!");
            return false;
        }
        alert("🔍 Searching for flights to " + destination + "...");
        return true;
    }
    
    function showBookAlert(origin, destination) {
        alert("✈️ You are about to book a flight from " + origin + " to " + destination + "!\n\nYou will be redirected to the booking page.");
    }
    
    var cards = document.getElementsByClassName('flight-card');
    for(var i = 0; i < cards.length; i++) {
        cards[i].style.animation = "fadeInUp 0.5s ease";
        cards[i].style.animationDelay = (i * 0.1) + "s";
    }
</script>

</body>
</html>