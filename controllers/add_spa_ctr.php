<?php
include("../classes/spa_class.php");


function add_spa_ctr($spa_name, $description, $location, $contact_phone, $email, $subscription_type) {
    // Validate input parameters
    if (empty($spa_name) || empty($description) || empty($location) || empty($contact_phone) || empty($email) || empty($subscription_type)) {
        return "Error: All fields are required.";
    }

    try {
        // Initialize the general_class instance
        $addspa = new general_class();

        // Call the add_spa method with the provided arguments
        return $addspa->add_spa($spa_name, $description, $location, $contact_phone, $email, $subscription_type);
    } catch (Exception $e) {
        // Handle any exceptions
        return "Error: Unable to add spa. Details: " . $e->getMessage();
    }
}


function show_spa_ctr(){
    $showspa=new general_class();
    return $showspa->show_spa();
   
}

function delete_spa_ctr($spa_id) {
    $deletespa = new general_class();
    return $deletespa->delete_spa($spa_id);
}

function update_spa_ctr($spa_id, $spa_name, $description, $location, $contact_phone, $email, $subscription_type, $status) {
    if (empty($spa_id) || empty($spa_name) || empty($description) || empty($location) || empty($contact_phone) || empty($email) || empty($subscription_type)) {
        return "Error: All fields are required.";
    }

    try {
        $updatespa = new general_class();
        return $updatespa->update_spa($spa_id, $spa_name, $description, $location, $contact_phone, $email, $subscription_type, $status);
    } catch (Exception $e) {
        return "Error: Unable to update spa. Details: " . $e->getMessage();
    }
}

?>