<?php
session_start();
include '../settings/db_class.php';
include_once '../classes/spa_class.php';

// Initialize database connection
$db = new db_connection();

// Query the database to retrieve the latest spa details
$query = "SELECT spa_name, description, location, contact_phone, email, subscription_type, fee AS subscription_fee FROM spas ORDER BY spa_id DESC LIMIT 1";
$result = $db->db_query($query);

// Check if any spa details were found
if ($result && $result->num_rows > 0) {
    $spa = $result->fetch_assoc();
} else {
    die("No spa details found in the database.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Bubble Booking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }
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
        header nav a {
            color: #fff;
            margin: 0 10px;
            text-decoration: none;
        }
        main {
            padding: 40px;
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        main h2 {
            color: #f57c00;
        }
        main p {
            margin-bottom: 15px;
        }
        button {
            padding: 15px;
            background: #f57c00;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
        }
        footer {
            text-align: center;
            padding: 10px;
            background: #333;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Complete Your Payment</h1>
        <nav>
            <a href="../index.php">Home</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Subscription Details</h2>
            <p><strong>Spa Name:</strong> <?php echo htmlspecialchars($spa['spa_name']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($spa['description']); ?></p>
            <p><strong>Location:</strong> <?php echo htmlspecialchars($spa['location']); ?></p>
            <p><strong>Contact Phone:</strong> <?php echo htmlspecialchars($spa['contact_phone']); ?></p>
            <p><strong>Email Address:</strong> <?php echo htmlspecialchars($spa['email']); ?></p>
            <p><strong>Subscription Type:</strong> <?php echo htmlspecialchars(ucfirst($spa['subscription_type'])); ?></p>
            <p><strong>Subscription Fee:</strong> $<?php echo htmlspecialchars($spa['subscription_fee']); ?></p>

            <!-- Payment Form -->
            <form id="paymentForm">
                <input type="hidden" name="email" id="email" value="<?php echo htmlspecialchars($spa['email']); ?>">
                <input type="hidden" name="amount" id="amount" value="<?php echo htmlspecialchars($spa['subscription_fee'] * 100); ?>"> <!-- Amount in kobo -->
                <button type="button" onclick="payWithPaystack()">Pay Now</button>
            </form>

            <!-- Paystack and jQuery Scripts -->
            <script src="https://js.paystack.co/v2/inline.js"></script>
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
            <script>
                function payWithPaystack() {
                    let email = document.getElementById('email').value;
                    let amount = document.getElementById('amount').value;

                    const paystack = new PaystackPop();
                    paystack.newTransaction({
                        key: 'pk_test_30cc6cbc6733b61ef615416a442b73558fac9e1e', // Replace with your Paystack public key
                        email: email,
                        amount: amount,
                        onSuccess: (transaction) => {
                            alert(`Payment Complete! Reference: ${transaction.reference}`); window.location.href = "../view/payment_success.php";
                            // You can redirect to a success page or process further here
                        },
                        onCancel: () => {
                            alert('Transaction was canceled.');
                        }
                    });
                }
            </script>
        </section>
    </main>
    <footer>
        <p>&copy; <?php echo date('Y'); ?> Bubble Booking. All Rights Reserved.</p>
    </footer>
</body>
</html>
