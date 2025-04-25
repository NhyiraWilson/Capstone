<?php
// Include the necessary files for database connection and SPA class
require_once '../settings/db_class.php';
require_once '../classes/spa_class.php';

// Check if spa_name is provided in the query string
if (!isset($_GET['spa_name']) || empty($_GET['spa_name'])) {
    die("Error: Spa name not provided.");
}

// Retrieve spa_name from the query string
$spa_name = $_GET['spa_name'];

// Create an instance of the general_class to fetch spa details
$spaClass = new general_class();
$spas = $spaClass->show_spa();

// Search for the spa with the given name
$spaDetails = null;
foreach ($spas as $spa) {
    if (strtolower($spa['spa_name']) === strtolower($spa_name)) {
        $spaDetails = $spa;
        break;
    }
}

// Check if the spa exists
if (!$spaDetails) {
    die("Error: Spa not found.");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($spaDetails['spa_name']); ?> - Spa Profile</title>
    <style>
        /* General Body Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Header Styling */
        header {
            background-color: #f57c00;
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
            font-size: 2em;
        }

        /* Main Content Styling */
        main {
            padding: 20px;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        main h2 {
            color: #f57c00;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .spa-details p {
            font-size: 1.1em;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .spa-details p strong {
            color: #333;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 10px 0;
            background: #333;
            color: white;
            margin-top: 20px;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <header>
        <h1>Spa Profile</h1>
    </header>

    <main>
        <h2><?php echo htmlspecialchars($spaDetails['spa_name']); ?></h2>
        <div class="spa-details">
            <p><strong>Description:</strong> <?php echo htmlspecialchars($spaDetails['description']); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($spaDetails['location']); ?></p>
            <p><strong>Contact Phone:</strong> <?php echo htmlspecialchars($spaDetails['contact_phone']); ?></p>
            <p><strong>Subscription Type:</strong> <?php echo htmlspecialchars($spaDetails['subscription_type']); ?></p>
            <p><strong>Subscription Fee:</strong> $<?php echo htmlspecialchars($spaDetails['fee']); ?></p>
        </div>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
