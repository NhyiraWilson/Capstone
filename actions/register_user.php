<?php 

// ini_set('display_errors', '1');
// ini_set('display_startup_errors', '1');
// error_reporting(E_ALL);
// include_once '../settings/db_class.php';

// if(isset($_POST["submit"])) {
   
//     $f_name=$_POST["f_name"];
//     $l_name=$_POST["l_name"];
//     $gender=$_POST["gender"];
//     $dob=$_POST["DOB"];
//     $phone_number=$_POST["Phone_number"];
//     $email=$_POST["Email"];
//     $password=$_POST["Passwords"];
//     $hashed_password= password_hash($password, PASSWORD_DEFAULT);


//     $i_query= "INSERT into users (Role_ID, f_name, l_name, gender, DOB, Phone_number, Email, Passwords)
//     VALUES (2, '$f_name', '$l_name', '$gender', '$dob', '$phone_number', '$email', '$hashed_password')"; 

//     if (db_query($i_query)) {
//         header("Location: ../view/login.php");
//         exit();
//     } else {
//         echo "Error: " . $i_query . "<br>" . mysqli_error($mysqli);
//     }
// } 
 

// Enable error reporting for debugging
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Include the db_connection class
include_once '../settings/db_class.php';

// Create an instance of the db_connection class
$db_instance = new db_connection();
$db = $db_instance->db_conn();

if (isset($_POST["submit"])) {
    // Retrieve and sanitize form inputs
    $f_name = $db_instance->escape_string($_POST["f_name"]);
    $l_name = $db_instance->escape_string($_POST["l_name"]);
    $gender = $db_instance->escape_string($_POST["gender"]);
    $dob = $db_instance->escape_string($_POST["DOB"]);
    $phone_number = $db_instance->escape_string($_POST["Phone_number"]);
    $email = $db_instance->escape_string($_POST["Email"]);
    $password = $_POST["Passwords"];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the INSERT query
    $i_query = "INSERT INTO users (Role_ID, f_name, l_name, gender, DOB, Phone_number, Email, Passwords)
                VALUES (2, '$f_name', '$l_name', '$gender', '$dob', '$phone_number', '$email', '$hashed_password')";

    // Execute the query and handle the response
    if ($db->query($i_query)) {
        header("Location: ../view/login.php");
        exit();
    } else {
        echo "Error: " . $i_query . "<br>" . $db->error;
    }
}

?>