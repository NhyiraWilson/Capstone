<?php
include_once '../settings/connection.php';
include '../admin/appointment_admin.php';

if(isset($_POST["submit"])) {
    $id =$_GET['EditID'];
    $Updatedappointment= $_POST['status'];
    $sql="UPDATE appointment SET Appointment_status='$Updatedappointment' WHERE Appointment_ID = '$id'"; 

    if (mysqli_query($mysqli, $sql)) {
        echo "Record updated successfully";
        header('Location: ../admin/edit_appointment_view.php');
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }

} else {
        echo "Submission error";
}
?>