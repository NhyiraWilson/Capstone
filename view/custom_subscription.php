<?php
session_start();
include '../settings/db_class.php';

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
    <title>Customization Subscription - Bubble Booking</title>
    <style>
        /* General Styling */
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
    font-size: 1.1em;
    margin-bottom: 30px;
    color: #666;
}

/* Form Styling */
form {
    max-width: 600px;
    margin: 0 auto;
    text-align: left;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    font-weight: bold;
    margin-bottom: 8px;
    color: #333;
}

form input, form textarea, form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

form input:focus, form textarea:focus, form select:focus {
    border-color: #f57c00;
    outline: none;
    box-shadow: 0 0 5px rgba(245, 124, 0, 0.5);
}

form textarea {
    resize: none;
}

form button {
    display: inline-block;
    width: 100%;
    padding: 15px;
    background: #f57c00;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
    font-size: 1.2em;
}

form button:hover {
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
        <h1>Customization Subscription</h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="spa_subscription.php">Back to Plans</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Subscribe to the Customization Plan</h2>
            <p>The Customization Subscription Plan includes personalized dashboards, branding options, and all platform features at $120 per month.</p>
            <form method="POST" action="../actions/add_spa.php">
                <input type="text" name="spa_name" placeholder="Spa Name" required>
                <textarea name="description" placeholder="Description" required></textarea>
                <input type="text" name="location" placeholder="Location" required>
                <input type="text" name="contact_phone" placeholder="Contact Phone" required>
                <input type="text" name="email" placeholder="E-mail" required>
                <select name="subscription_type" required>
                    <option value="customization">Customization</option>
                    <option value="standard">Standard</option>
                </select>
                <button type="submit">Add Spa</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
