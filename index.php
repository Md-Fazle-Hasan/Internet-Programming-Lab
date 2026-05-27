// done by Tahmina Tuly

<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexus Airways - Home</title>
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
            background: #0a0f1a;
            color: #fff;
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
        }
        
        .nav-links a:hover {
            color: #00e0ff;
        }
        
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 6rem 2rem 4rem;
            background: linear-gradient(135deg, #0a1428 0%, #03060f 100%);
            position: relative;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://images.pexels.com/photos/62623/wing-plane-flying-airplane-62623.jpeg?auto=compress&cs=tinysrgb&w=1600');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 0;
        }
        
        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 3rem;
            position: relative;
            z-index: 2;
        }
        
        .hero-text {
            flex: 1;
        }
        
        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(to right, #fff, #7ad0ff, #00e0ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .hero-text p {
            margin: 1.5rem 0;
            color: #b9c7dd;
            font-size: 1.1rem;
        }
        
        .btn {
            background: linear-gradient(95deg, #00e0ff, #0077ff);
            padding: 1rem 2rem;
            border-radius: 40px;
            color: white;
            text-decoration: none;
            display: inline-block;
            font-weight: 700;
            transition: 0.3s;
        }
        
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(0,224,255,0.3);
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 4rem 2rem;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 3rem;
        }
        
        .section-title span {
            color: #00e0ff;
        }
        
        .flight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .flight-card {
            background: rgba(18, 28, 48, 0.7);
            border-radius: 24px;
            padding: 1.5rem;
            border: 1px solid rgba(0,224,255,0.2);
            transition: 0.3s;
        }
        
        .flight-card:hover {
            transform: translateY(-5px);
            border-color: #00e0ff;
        }
        
        .flight-card h3 {
            font-size: 1.3rem;
            margin-bottom: 0.5rem;
        }
        
        .flight-time {
            color: #00e0ff;
            margin: 0.5rem 0;
        }
        
        .flight-price {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 1rem 0;
            color: #00e0ff;
        }
        
        .btn-book {
            background: transparent;
            border: 1px solid #00e0ff;
            padding: 0.5rem 1rem;
            border-radius: 40px;
            color: white;
            text-align: center;
            display: inline-block;
            text-decoration: none;
            width: 100%;
            transition: 0.3s;
        }
        
        .btn-book:hover {
            background: #00e0ff;
            color: #0a0f1a;
        }
        
        footer {
            background: #050a14;
            padding: 2rem;
            text-align: center;
            border-top: 1px solid #1e2a47;
        }
        
        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 2rem;
            }
            .nav-container {
                flex-direction: column;
                text-align: center;
            }
            .nav-links {
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <div class="nav-container">
        <div class="logo">
            <i class="fas fa-plane"></i> Nexus Airways
        </div>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="search.php">Search Flights</a>
            <a href="booking.php">Book Ticket</a>
            <a href="about.php">About Us</a>
        </div>
    </div>
</nav>

<section class="hero">
    <div class="hero-content">
        <div class="hero-text">
            <h1>Elevating Air Travel Through Intelligent Systems</h1>
            <p>Experience seamless innovation from flight booking to premium services. Nexus Airways redefines your journey with cutting-edge technology.</p>
            <a href="search.php" class="btn">Explore Destinations →</a>
        </div>
        <div class="hero-visual">
            <i class="fas fa-plane" style="font-size: 8rem; color: #00e0ff; opacity: 0.8;"></i>
        </div>
    </div>
</section>

<div class="container">
    <div class="section-title">Featured <span>Flights</span></div>
    <div class="flight-grid">
        <?php
        $sql = "SELECT * FROM flights LIMIT 3";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()):
        ?>
        <div class="flight-card">
            <h3><?php echo $row['origin']; ?> → <?php echo $row['destination']; ?></h3>
            <div class="flight-time"><i class="far fa-clock"></i> <?php echo $row['departure_time']; ?></div>
            <div class="flight-price">$<?php echo $row['price']; ?></div>
            <a href="booking.php?flight_id=<?php echo $row['id']; ?>" class="btn-book">Book Now →</a>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<footer>
    <p> 2026 Nexus Airways — Elevating Air Travel Through Intelligent Systems</p>
</footer>

</body>
</html>