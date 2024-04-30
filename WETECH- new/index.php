//Shema_Christian_222005490
//Group One
<?php
// Start session
session_start();

// Check if session variable is set
if (!isset($_SESSION["email"])) {
    // Redirect to sign-in page if not logged in
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Amani's Barbershop</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('barberWallpaper.jpg');/* Set background image */
            background-size: cover;
            background-position: center;
        }
        header {
            background-color: rgba(0, 0, 0, 0.6); /* Transparent black background */
            color: white;
            padding: 20px;
            text-align: center;
        }
        nav {
            background-color: rgba(0, 0, 0, 0.8); /* Transparent black background */
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s;
        }
        nav a:hover {
            background-color: #555;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: rgba(0, 0, 0, 0.8); /* Transparent black background */
            min-width: 160px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1;
            text-align: left;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #555;
        }
        .signout {
            background-color: #ff6347; /* Tomato */
           
        }
        main {
            padding: 20px;
            text-align: center;
        }
        section {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent white background */
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Box shadow for section */
        }
        footer {
            background-color: rgba(0, 0, 0, 0.6); /* Transparent black background */
            color: white;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Online Amani's Barbershop</h1>
    </header>
    <nav>
        <a href="home.html">Home</a>

        <a href="about.html">About Us</a>
        <a href="contactUs.html">Contact Us</a>
        
        <!-- Dropdown for Options -->
        <div class="dropdown">
            <a href="#" class="dropbtn">Options</a>
            <div class="dropdown-content">
                <a href="signup.html">Sign Up</a>
                <a href="signin.html">Sign In</a>
                <a href="#" class="signout">Sign Out</a>
            </div>
        </div>
    </nav>
    <main>
        <section>
            <h2>Introduction</h2>
            <p>Welcome to Online Amani's Barbershop, where we blend traditional barbering expertise with the convenience of modern technology. Step into our virtual space and experience grooming like never before. Whether you're looking for a classic haircut, a fresh shave, or a stylish beard trim, we've got you covered. At Online Amani's, we believe that looking your best shouldn't be a hassle. That's why we've brought the barbershop experience to your fingertips, allowing you to book appointments, consult with our skilled barbers, and enjoy professional grooming services from the comfort of your own home.</p>
        </section>
    </main>
    <footer>
        <!-- Display the user's email if set -->
        <?php if(isset($userEmail)) { ?>
            <p><marquee><?php echo htmlentities($userEmail); ?>, Welcome to Online Amani's Barbershop</marquee></p>
        <?php } else { ?>
            <p><marquee>&copy; 2024 Online Amani's Barbershop</marquee></p>
        <?php } ?>
    </footer>
    <script>
        document.querySelector('.signout').addEventListener('click', function() {
    // Ask for confirmation before signing out
    if (confirm("Are you sure you want to sign out?")) {
        // Redirect user to the sign-in page
        window.location.href = "signup.html";
     }
    }); 
    </script>
</body>
</html>
//Shema_Christian_222005490
//Group One