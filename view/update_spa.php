<?php
require_once("../controllers/add_spa_ctr.php");

if (isset($_GET['spa_id'])) {
    $spa_id = $_GET['spa_id'];

    // Fetch the spa details to pre-fill the form
    $spa = null;
    $spas = show_spa_ctr(); // Assuming `show_spa_ctr` returns an array of spas
    foreach ($spas as $item) {
        if ($item['spa_id'] == $spa_id) {
            $spa = $item;
            break;
        }
    }

    if (!$spa) {
        echo "Spa not found.";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updated = update_spa_ctr(
        $_POST['spa_id'],
        $_POST['spa_name'],
        $_POST['description'],
        $_POST['location'],
        $_POST['contact_phone'],
        $_POST['email'],
        $_POST['subscription_type'],
        $_POST['status']
    );

    if ($updated) {
        echo "Spa updated successfully!";
        header("Location: bubble_dashboard.php");
        exit;
    } else {
        echo "Error updating spa.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Spa</title>
    <style>
/* General Reset */
* {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }

        /* Container Styling */
        .form-container {
            width: 100%;
            max-width: 500px;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .form-container h2 {
            text-align: center;
            color: #444;
            font-size: 1.8em;
            margin-bottom: 20px;
        }

        /* Form Styling */
        form {
            width: 100%;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 6px;
            outline: none;
            background: #f9f9f9;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            border-color: #f57c00;
            background: #fff;
        }

        textarea {
            resize: vertical;
        }

        /* Button Styling */
        .btn {
            display: inline-block;
            width: 100%;
            padding: 12px;
            font-size: 1.1em;
            color: #fff;
            background: #f57c00;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-align: center;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background: #e64a19;
        }

        /* Error Messages */
        .error-message {
            color: #ff4d4d;
            font-size: 0.9em;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Success Messages */
        .success-message {
            color: #4caf50;
            font-size: 0.9em;
            text-align: center;
            margin-bottom: 15px;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .form-container {
                padding: 20px;
            }

            .form-container h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
    <h2>Update Spa</h2>
    <form method="POST">
        <input type="hidden" name="spa_id" value="<?php echo htmlspecialchars($spa['spa_id']); ?>">
        
        <label>Spa Name:</label><br>
        <input type="text" name="spa_name" value="<?php echo htmlspecialchars($spa['spa_name']); ?>" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" required><?php echo htmlspecialchars($spa['description']); ?></textarea><br><br>

        <label>Location:</label><br>
        <input type="text" name="location" value="<?php echo htmlspecialchars($spa['location']); ?>" required><br><br>

        <label>Contact Phone:</label><br>
        <input type="text" name="contact_phone" value="<?php echo htmlspecialchars($spa['contact_phone']); ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($spa['email']); ?>" required><br><br>

        <label>Subscription Type:</label><br>
        <select name="subscription_type" required>
            <option value="customization" <?php echo ($spa['subscription_type'] == 'customization') ? 'selected' : ''; ?>>Customization</option>
            <option value="standard" <?php echo ($spa['subscription_type'] == 'standard') ? 'selected' : ''; ?>>Standard</option>
        </select><br><br>

        <label>Status:</label><br>
        <select name="status" required>
            <option value="1" <?php echo ($spa['status'] == 1) ? 'selected' : ''; ?>>Active</option>
            <option value="0" <?php echo ($spa['status'] == 0) ? 'selected' : ''; ?>>Inactive</option>
        </select><br><br>

        <button type="submit">Update Spa</button>
    </form>
</body>
</html>
