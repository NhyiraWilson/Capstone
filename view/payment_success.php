<?php
session_start();
include '../settings/db_class.php';
include_once '../classes/spa_class.php';

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: payment.php");
//     exit;
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success - Bubble Booking</title>
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
/* Payment Success Page */
main {
    padding: 40px 20px;
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

main h2 {
    font-size: 2em;
    color: #f57c00;
    margin-bottom: 20px;
}

main p {
    font-size: 1.2em;
    margin-bottom: 30px;
    color: #666;
}

main ul {
    text-align: left;
    margin-bottom: 20px;
    font-size: 1.1em;
}

main ul li {
    margin-bottom: 10px;
}

main .button {
    padding: 15px 30px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    transition: background 0.3s ease;
}

main .button:hover {
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
        <h1>Payment Successful</h1>
        <nav>
            <a href="../index.php">Back to main</a>
            <a href="parlours.php">View Parlours</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Thank You for Your Subscription!</h2>
            <p>Your subscription to Bubble Booking has been successfully processed. We are excited to have you onboard!</p>
            <p>Subscription Details:</p>
            <ul>
                <li><strong>Spa Name:</strong> <?php echo htmlspecialchars($_POST['spa_name']); ?></li>
                <li><strong>Description:</strong> <?php echo htmlspecialchars($_POST['description']); ?></li>
                <li><strong>Location:</strong> <?php echo htmlspecialchars($_POST['location']); ?></li>
                <li><strong>Contact Phone:</strong> <?php echo htmlspecialchars($_POST['contact_phone']); ?></li>
                <li><strong>Email Address:</strong> <?php echo htmlspecialchars($_POST['email']); ?></li>
                <li><strong>Subscription Type:</strong> <?php echo htmlspecialchars(ucfirst($_POST['subscription_type'])); ?></li>
                <li><strong>Subscription Fee:</strong> $<?php echo htmlspecialchars($_POST['subscription_fee']); ?></li>
            </ul>
            <p>You can now start managing your spa and engage with your customers through Bubble Booking.</p>
            <a href="register.php" class="button">Register now to begin your journey</a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
