<?php
// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Include the controller to access the update functionality
require_once("../controllers/add_spa_ctr.php");

// Check if the request method is POST (ensures the form was submitted)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $spa_id = $_POST['spa_id'];
    $spa_name = $_POST['spa_name'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $contact_phone = $_POST['contact_phone'];
    $email = $_POST['email'];
    $subscription_type = $_POST['subscription_type'];
    $status = $_POST['status'];

    // Validate that all required fields are filled
    if (
        empty($spa_id) || empty($spa_name) || empty($description) || empty($location) ||
        empty($contact_phone) || empty($email) || empty($subscription_type) || empty($status)
    ) {
        echo "Error: All fields are required.";
        exit;
    }

    // Call the update controller function
    $update_result = update_spa_ctr($spa_id, $spa_name, $description, $location, $contact_phone, $email, $subscription_type, $status);

    // Check if the update was successful
    if ($update_result) {
        // Redirect to the dashboard with a success message
        header("Location: ../view/bubble_dashboard.php?message=Spa updated successfully");
        exit;
    } else {
        echo "Error: Failed to update spa.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
