<?php
include '../settings/db_class.php';

$db = new mysqli();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $spa_id = (int) $_POST['spa_id'];

    if (isset($_POST['update_subscription'])) {
        $subscription_type = $db->escape_string($_POST['subscription_type']);
        $status = $db->escape_string($_POST['status']);

        $sql = "UPDATE spas SET subscription_type = '$subscription_type', status = '$status' WHERE spa_id = $spa_id";
        if ($db->query($sql)) {
            header("Location: ../view/admin_dashboard.php?message=Subscription Updated");
        } else {
            echo "Error updating subscription: " . $conn->error;
        }
    } elseif (isset($_POST['delete_subscription'])) {
        $sql = "DELETE FROM spas WHERE spa_id = $spa_id";
        if ($db->query($sql)) {
            header("Location: ../view/admin_dashboard.php?message=Subscription Deleted");
        } else {
            echo "Error deleting subscription: " . $conn->error;
        }
    }
}
?>
