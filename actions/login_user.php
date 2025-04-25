<?php
// session_start();
// include '../settings/core.php';
// include_once '../settings/db_class.php';

// function findRoles($userRoleID) {
//     if ($userRoleID==1) {
//         header("Location: ../view/parlouradmin.php.php");
//         exit();
//     }elseif ($userRoleID==2) {
//         header("Location: ../view/home.php");
//         exit();
//     }elseif ($userRoleID==3){
//         header("Location: ../view/bubble_dashboard.php");
//         exit();
//     }else {
//         echo 'Access denied';
//         exit();
//     }
// }

// if (isset($_POST['submit'])) {

//     $username=$_POST["Username"];
//     $password=$_POST["Passwords"];
//     $s_query = "SELECT * from users WHERE Email='$username'";
//     $result = $mysqli->query($s_query);


//     if ($result->num_rows > 0) {
//         $check_login = mysqli_fetch_assoc($result);
//         if(password_verify($password, $check_login['Passwords'])){
//             // session_start();
//             $_SESSION['User_ID']=$check_login['User_ID'];
//             $_SESSION['user_role']=$check_login['Role_ID'];
            
//             findRoles($_SESSION['user_role']);

//             echo "verified";
//         }else{
//             echo "failed to verify";
//         }
//     } else {
//         return[];
//     }
//     $mysqli->close();
// }



// session_start();
// include '../settings/core.php';
// include_once '../settings/db_class.php';
// ini_set('display_errors', 1);
// error_reporting(E_ALL);

// // Function to redirect users based on their role
// function redirectUserByRole($userRoleID) {
//     switch ($userRoleID) {
//         case 1:
//             header("Location: ../view/parlouradmin.php");
//             break;
//         case 2:
//             header("Location: ../view/home.php");
//             break;
//         case 3:
//             header("Location: ../view/bubble_dashboard.php");
//             break;
//         default:
//             echo 'Access denied';
//             break;
//     }
//     exit(); // Ensure exit is called after header to prevent further script execution
// }

// // Check if the form is submitted
// if (isset($_POST['submit'])) {
//     // Create an instance of db_connection
//     $db_instance = new db_connection();
//     $db = $db_instance->db_conn();

//     // Retrieve and sanitize user input
//     $username = $db_instance->escape_string(trim($_POST["Username"])); // Trim extra spaces
//     $password = $_POST["Passwords"]; // Password is hashed, no need to escape it here

//     // Query to fetch user by email
//     $s_query = "SELECT * FROM users WHERE Email = ?";
//     $stmt = $db->prepare($s_query);
//     $stmt->bind_param("s", $username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result && $result->num_rows > 0) {
//         $check_login = $result->fetch_assoc();

//         // Verify the password
//         if (password_verify($password, $check_login['Passwords'])) {
//             // Set session variables
//             $_SESSION['User_ID'] = $check_login['User_ID'];
//             $_SESSION['user_role'] = $check_login['Role_ID'];

//             // Redirect based on user role
//             redirectUserByRole($_SESSION['user_role']);
//         } else {
//             echo "Failed to verify. Incorrect password.";
//         }
//     } else {
//         echo "No user found with the provided email.";
//     }

//     // Close the statement and database connection
//     $stmt->close();
//     $db->close();
// }



session_start();
include '../settings/core.php';
include_once '../settings/db_class.php';
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Redirects users based on their role.
 * @param int $userRoleID User's role ID.
 */
function redirectUserByRole($userRoleID) {
    $redirectPaths = [
        1 => '../view/parlouradmin.php',     // Parlour Admin
        2 => '../view/home.php',             // Regular User
        3 => '../view/bubble_dashboard.php'  // Bubble Dashboard User
    ];

    if (array_key_exists($userRoleID, $redirectPaths)) {
        header("Location: " . $redirectPaths[$userRoleID]);
        exit();
    } else {
        echo 'Access denied';
        exit();
    }
}

// Process login if the submit button is pressed.
if (isset($_POST['submit'])) {
    $db_instance = new db_connection();
    $db = $db_instance->db_conn();
    
    $username = $db_instance->escape_string(trim($_POST["Username"]));
    $password = $_POST["Passwords"]; // Directly retrieve password.

    // Prepared statement to fetch user by email.
    $stmt = $db->prepare("SELECT User_ID, Role_ID, Passwords FROM users WHERE Email = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Check if the hashed password matches.
        if (password_verify($password, $user['Passwords'])) {
            $_SESSION['User_ID'] = $user['User_ID'];
            $_SESSION['user_role'] = $user['Role_ID'];
            redirectUserByRole($_SESSION['user_role']);
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No account associated with that email.";
    }

    $stmt->close();
    $db->close();
}

?>
