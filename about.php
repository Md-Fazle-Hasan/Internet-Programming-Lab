// done by Md. Fazle Hasan

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Nexus Airways</title>
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
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 8rem 2rem 4rem;
        }
        
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            font-size: 2.5rem;
        }
        
        .about-content {
            background: rgba(18, 28, 48, 0.9);
            backdrop-filter: blur(20px);
            border-radius: 2rem;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .feature {
            text-align: center;
            padding: 1.5rem;
        }
        
        .feature i {
            font-size: 3rem;
            color: #00e0ff;
            margin-bottom: 1rem;
        }
        
        .feature h3 {
            margin-bottom: 0.5rem;
        }
        
        .feature p {
            color: #b9c7dd;
            font-size: 0.9rem;
        }
        
        .makers {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .maker {
            text-align: center;
        }
        
        .maker i {
            font-size: 4rem;
            background: linear-gradient(135deg, #00e0ff, #0077ff);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .maker h3 {
            margin-top: 0.5rem;
            color: #00e0ff;
        }
        
        .maker p {
            color: #b9c7dd;
        }
        
        footer {
            background: #050a14;
            padding: 2rem;
            text-align: center;
            border-top: 1px solid #1e2a47;
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
            .features {
                grid-template-columns: 1fr;
            }
            .makers {
                gap: 1.5rem;
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
    <h1>About Nexus Airways</h1>
    
    <div class="about-content">
        <p style="font-size: 1.2rem; text-align: center; margin-bottom: 2rem;">
            Nexus Airways is revolutionizing air travel through intelligent systems, 
            exceptional service, and passenger-first innovations.
        </p>
        
        <div class="features">
            <div class="feature">
                <i class="fas fa-robot"></i>
                <h3>AI-Powered Travel</h3>
                <p>Smart flight recommendations and real-time assistance</p>
            </div>
            <div class="feature">
                <i class="fas fa-hand-holding-heart"></i>
                <h3>Emergency Care</h3>
                <p>Special medical priority system for passengers in need</p>
            </div>
            <div class="feature">
                <i class="fas fa-globe"></i>
                <h3>Global Network</h3>
                <p>Connecting major destinations worldwide</p>
            </div>
            <div class="feature">
                <i class="fas fa-shield-alt"></i>
                <h3>Secure Booking</h3>
                <p>Safe and encrypted payment processing</p>
            </div>
        </div>
    </div>
    
    <div class="about-content">
        <h2 style="text-align: center;">Our Mission</h2>
        <p style="text-align: center; margin-top: 1rem;">
            To provide seamless, intelligent, and caring air travel experiences 
            that prioritize passenger comfort, safety, and convenience.
        </p>
    </div>
    
    <div class="about-content">
        <h2 style="text-align: center;">Meet Our Team</h2>
        <div class="makers">
            <div class="maker">
                <i class="fas fa-user-astronaut"></i>
                <h3>Md. Fazle Hasan</h3>
                <p>Lead Architect</p>
            </div>
            <div class="maker">
                <i class="fas fa-female"></i>
                <h3>Tahmina Tuly</h3>
                <p>Lead Engineer</p>
            </div>
        </div>
    </div>
</div>

<footer>
    <p>© 2025 Nexus Airways — Elevating Air Travel Through Intelligent Systems</p>
</footer>

</body>
</html>