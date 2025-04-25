<?php
session_start();

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: home.php");
//     exit;
// }

// Fetch user details
// $user_name = $_SESSION['user_name'];
$username=$_SESSION["Username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Bubble Booking</title>
    <!-- <link rel="stylesheet" href="../css/bubble.css"> -->
    <style>
        /* General Reset */
body, h1, h2, h3, p, ul, li, a {
    margin: 0;
    padding: 0;
    text-decoration: none;
    list-style: none;
    font-family: Arial, sans-serif;
    color: #333;
}

/* Body Styling */
body {
    background-color: #f9f9f9;
    font-size: 16px;
    line-height: 1.6;
}

/* Header */
header {
    background: #333;
    color: #fff;
    padding: 15px 20px;
    text-align: center;
}

header h1 {
    margin: 0;
    font-size: 1.8em;
}

header nav {
    margin-top: 10px;
}

header nav a {
    color: #fff;
    padding: 10px 15px;
    background: #555;
    border-radius: 5px;
    margin-right: 10px;
    transition: background 0.3s ease;
}

header nav a:hover {
    background: #f9a826;
}

/* Main Content */
main {
    padding: 20px;
    max-width: 1200px;
    margin: 0 auto;
    background: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

main h2 {
    font-size: 1.5em;
    margin-bottom: 20px;
}

main p {
    margin-bottom: 20px;
    font-size: 1.1em;
    color: #666;
}

main ul {
    padding: 0;
}

main ul li {
    margin-bottom: 20px;
    padding: 15px;
    background: #f0f0f0;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

main ul li h2 {
    margin-bottom: 10px;
    font-size: 1.3em;
    color: #f57c00;
}

main ul li p {
    margin-bottom: 5px;
}

/* Buttons */
.button {
    display: inline-block;
    padding: 10px 20px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

.button:hover {
    background: #e64a19;
}

/* Footer */
footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-top: 20px;
    border-radius: 0 0 10px 10px;
}

footer p {
    font-size: 0.9em;
}

    </style>
</head>
<body>
    <header>
        <h1>Welcome, <?php echo htmlspecialchars($user_name); ?>!</h1>
        <nav>
            <a href="parlours.php">View Parlours</a>
            <a href="cart.php">Your Cart</a>
            <a href="profile.php">Profile</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Discover the Best Spa Experiences</h2>
            <p>Browse our list of partnered parlours and find the perfect service for you.</p>
            <a href="parlours.php" class="button">Explore Parlours</a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
