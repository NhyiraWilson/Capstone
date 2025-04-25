<?php


// include ('../controllers/add_spa_ctr.php');

// if ($_SERVER['REQUEST_METHOD'] == "POST"){
//     $spa_name = $_POST["spa_name"];
//     $addspa = add_spa_ctr($spa_name, $description, $location, $contact_phone, $subscription_type);
//     if($addspa !== false){
//         header("Location: ../view/payment.php?message=Subscription Successful!");
//         exit();
//     } else{
//         echo "Error adding Spa";
//     }
// }

?>
<?php

include ('../controllers/add_spa_ctr.php');

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $spa_name = $_POST["spa_name"];
    $description = $_POST["description"];
    $location = $_POST["location"];
    $contact_phone = $_POST["contact_phone"];
    $email = $_POST["email"];

    $subscription_type = $_POST["subscription_type"];

    $addspa = add_spa_ctr($spa_name, $description, $location, $contact_phone, $email, $subscription_type);
    if ($addspa !== false) {
        header("Location: ../view/payment.php?message=Subscription Successful!");
        exit();
    } else {
        echo "Error adding Spa";
    }
}
?>