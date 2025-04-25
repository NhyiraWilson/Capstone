<?php
session_start();
include '../settings/db_class.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] != 'admin') {
    header("Location: bubble_dashboard.php");
    exit;
}

$db = new db_connection();
$conn = $db->db_conn();

// Fetch spa subscription details
$query = "SELECT * FROM spas";
$result = $conn->query($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Bubble Booking</title>
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

/* Section Title */
main h2 {
    font-size: 2em;
    color: #f57c00;
    margin-bottom: 20px;
    text-align: center;
}

/* Table Styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
}

table th, table td {
    padding: 12px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #f57c00;
    color: white;
}

table td {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #f1f1f1;
}

/* Button Styling */
button {
    padding: 10px 20px;
    background: #f57c00;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background 0.3s ease;
}

button:hover {
    background: #e64a19;
}

button[style] {
    background-color: #e64a19;
}

/* Footer Styling */
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
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <main>
        <section>
            <h2>Manage Subscriptions</h2>
            <table>
                <thead>
                    <tr>
                        <th>Spa Name</th>
                        <th>Spa ID</th>
                        <th>Subscription Type</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result && $result->num_rows > 0) {
                        while ($spa = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . htmlspecialchars($spa['spa_name']) . "</td>
                                    <td>" . htmlspecialchars($spa['spa_id']) . "</td>
                                    <td>" . ucfirst(htmlspecialchars($spa['subscription_type'])) . "</td>
                                    <td>$" . htmlspecialchars($spa['fee']) . "</td>
                                    <td>" . ($spa['status'] == 1 ? 'Active' : 'Inactive') . "</td>
                                    <td>
                                        <a href='../view/update_spa.php?spa_id=" . $spa['spa_id'] . "'>Update</a> |
                                        <a href='../actions/delete_spa.php?spa_id=" . $spa['spa_id'] . "'>Delete</a>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No subscriptions found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
