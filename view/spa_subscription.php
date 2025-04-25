<?php
session_start();
include '../settings/db_class.php';

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spa Subscription - Bubble Booking</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>
        /* General Body Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
    color: #333;
}

/* Header Styling */
header {
    background: #333;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    font-size: 2em;
    margin-bottom: 10px;
}

header nav {
    margin-top: 10px;
}

header nav a {
    color: #fff;
    margin: 0 10px;
    padding: 10px 15px;
    background: #555;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
}

header nav a:hover {
    background: #f57c00;
}

/* Main Content */
main {
    padding: 40px 20px;
    max-width: 1200px;
    margin: 20px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

main h2 {
    text-align: center;
    font-size: 2em;
    color: #f57c00;
    margin-bottom: 20px;
}

main p {
    text-align: center;
    font-size: 1.2em;
    margin-bottom: 40px;
    color: #666;
}

/* Subscription Options Section */
.subscription-options {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    gap: 20px;
}

.option {
    background: #f9f9f9;
    padding: 20px;
    width: 45%;
    text-align: center;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.option:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
}

.option h3 {
    font-size: 1.8em;
    margin-bottom: 15px;
    color: #f57c00;
}

.option p {
    font-size: 1.1em;
    margin-bottom: 20px;
    color: #666;
}

.option .button {
    padding: 10px 20px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    transition: background 0.3s ease;
    display: inline-block;
}

.option .button:hover {
    background: #e64a19;
}

/* Footer */
footer {
    background: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    margin-top: 40px;
    border-radius: 0 0 10px 10px;
    font-size: 0.9em;
}

    </style>
</head>
<body>
    <header>
        <h1>Subscribe to Bubble Booking</h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="parlours.php">View Parlours</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Choose Your Subscription Plan</h2>
            <p>Select a subscription plan that best suits your business needs. Each plan offers access to our platform's premium features and tools to grow your spa business.</p>

            <div class="subscription-options">
                <div class="option">
                    <h3>Normal Subscription</h3>
                    <p>$80 per month</p>
                    <p>Gain access to our platform to manage bookings and reach more customers.</p>
                    <a href="normal_subscription.php" class="button">Select Normal Subscription</a>
                </div>

                <div class="option">
                    <h3>Customization Subscription</h3>
                    <p>$120 per month</p>
                    <p>Enjoy all platform features plus a personalized dashboard and branding options.</p>
                    <a href="custom_subscription.php" class="button">Select Custom Subscription</a>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
