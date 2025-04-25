<?php
session_start();
include '../settings/db_class.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new db_connection();
    $conn = $db->db_conn();

    // Sanitize input
    $firstName = $db->escape_string(trim($_POST['firstName']));
    $lastName = $db->escape_string(trim($_POST['lastName']));
    $email = $db->escape_string(trim($_POST['email']));
    $phone = $db->escape_string(trim($_POST['phone']));
    $dob = $db->escape_string(trim($_POST['dob']));
    $preferences = $db->escape_string(trim($_POST['preferences']));

    // Insert into customers table
    $query = "INSERT INTO customers (first_name, last_name, email, phone, dob, preferences) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    if ($stmt === false) {
        die("MySQL prepare error: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $firstName, $lastName, $email, $phone, $dob, $preferences);

    if ($stmt->execute()) {
        header("Location: ../view/user_admin.php?success=1");
        exit;
    } else {
        echo "Error saving customer: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
