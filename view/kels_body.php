<?php
session_start();
include '../settings/db_class.php';

// // Check if the user is logged in
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit;
// }

// Fetch parlour details from the database
$db = new db_connection();
$conn = $db->db_conn();

$query = "SELECT spa_name, description, location, contact_phone, email FROM spas WHERE spa_name = 'Kels Body' LIMIT 1";
$result = $conn->query($query);

// Check if the parlour exists
$spa = [];
if ($result && $result->num_rows > 0) {
    $spa = $result->fetch_assoc();
} else {
    die("Parlour not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($parlour['spa_name']); ?> - Bubble Booking</title>
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
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
    font-size: 2em;
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
    background: #f57c00;
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

main section {
    margin-bottom: 30px;
}

main h2 {
    font-size: 1.8em;
    margin-bottom: 15px;
    color: #f57c00;
}

main p {
    margin-bottom: 15px;
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

main ul li h3 {
    margin-bottom: 10px;
    font-size: 1.3em;
    color: #f57c00;
}

main ul li p {
    margin-bottom: 5px;
}
.spa-services {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-top: 20px;
}
.spa-service-card {
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    background-color: burlywood;
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
    text-align: center;
}

.button:hover {
    background: #e64a19;
}
</style>
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($spa['spa_name']); ?></h1>
        <nav>
            <a href="home.php">Home</a>
            <a href="parlours.php">All Parlours</a>
            <a href="appointment.php">Book Your Appointment</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section>
        <h2>About Us</h2>
        <p>Indulge in a world of relaxation and rejuvenation at our luxurious spa.</p>
        <br>
        <p>Please be sure to book your appointment at least 2 days before your appointment date.</p>
        <p>Also be sure to arrive at least 15 minutes before your appointment time to get settled in before we begin and enjoy a free eucalyptis bath and cucumder water</p>
        </section>

        <section>
            <h2>Location</h2>
            <p><?php echo htmlspecialchars($spa['location']); ?></p>
        </section>

        <section>
            <h2>Contact Us</h2>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($spa['contact_phone']); ?></p>
            <p><strong>E-mail:</strong> <?php echo htmlspecialchars($spa['email']); ?></p>
        </section>

        <section>
            <h2>Our Services</h2>
            <div class="spa-services">
            <a href="../view/massage.php" class="spa-service-card">
                <h2>Massage Therapy</h2>
                <p>Relieve stress and tension with our expert massage therapists.</p>
            </a>
            <a href="../view/face_n_body.php" class="spa-service-card">
                <h2>Face & Body Treatments</h2>
                <p>Restore your skin's natural glow with our personalized facial treatments.</p>
            </a>
            <a href="../view/salon.php"class="spa-service-card">
                <h2>Hair Treatments</h2>
                <p>Pamper yourself with our luxurious body treatments and wraps.</p>
            </a>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
