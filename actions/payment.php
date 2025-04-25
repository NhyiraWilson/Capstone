<?php
// session_start();
// include '../settings/db_class.php';

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $db = new db_connection();

//     // Collect payment and subscription details
//     $spa_id = (int) $_POST['spa_id'];
//     $subscription_type = $db->escape_string($_POST['subscription_type']);
//     $amount = (float) $_POST['amount'];
//     $payment_method = $db->escape_string($_POST['payment_method']); // e.g., 'credit_card', 'paypal'
//     $payment_status = 'completed'; // For simplicity, assuming all payments succeed

//     // Insert payment record
//     $sql_payment = "INSERT INTO payments (appointment_id, amount, payment_method, payment_status) 
//                     VALUES ('$spa_id', '$amount', '$payment_method', '$payment_status')";
//     if ($db->db_query($sql_payment)) {
//         // Update spa subscription details
//         $sql_update_subscription = "UPDATE spas SET subscription_type = '$subscription_type', fee = '$amount', status = '1'
//                                     WHERE spa_id = $spa_id";
//         if ($db->db_query($sql_update_subscription)) {
//             header("Location: ../view/payment_success.php?message=Payment Successful");
//         } else {
//             echo "Error updating subscription: " . $this->db->connect_error;
//         }
//     } else {
//         echo "Error processing payment: " . $this->db->connect_error;
//     }
// }
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/verify/:reference",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_f1529bac85f855c6a28b59ae4045c82e80c9e69d",
    "Cache-Control: no-cache",
  ),
));
  
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
  
if ($err) {
  echo "cURL Error #:" . $err;
} else {
      echo $response;
  }

?>