<?php
include_once '../settings/db_class.php';
include '../view/appointment_admin.php';

if(isset($_GET['delid'])) {
    $id=$_GET['delid'];
    $sql="DELETE FROM appointment WHERE Appointment_ID = '$id'"; 

    if (mysqli_query($mysqli, $sql)) {
        echo "Record deleted successfully";
        header('Location: ../view/appointment_admin.php');
        
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($mysqli);
    }

    } else {
    header('Location: ../view/appointment_admin.php');
    }
    mysqli_close($mysqli);
?>
