<?php
//connect to database class
require("../settings/db_class.php");

class Payment extends db_connection{
    //function to insert payment details into the database
    function insert_payment_class($amount, $transaction_id, $spa_id, $payment_status, $payment_date){
        $sql= "INSERT INTO subscription_transactions (amount, transaction_id, spa_id, payment_status, payment_date) 
        VALUES ('$amount', '$transaction_id', '$spa_id', '$payment_status', '$payment_date')";
        return $this->db_query($sql);
    }



}



?>