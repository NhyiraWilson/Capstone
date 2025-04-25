<?php 
session_start();
include_once '../settings/db_class.php';

if(isset($_POST["submit"])) {

    $salon=$_POST['Salonname'];
    $massage=$_POST["Massagename"];
    $body=$_POST["bodyname"];
    $date=$_POST["date"];
    $start=$_POST["time"];
    $end=$_POST["End_time"];
    $status=$_POST["status"];
    $userID =  $_SESSION['User_ID'];



    $i_query= "INSERT into appointment (Salon_ID, Massage_ID, body_ID, Staff_ID, User_ID, Appointment_date, Start_time, End_time, Appointment_status)
    VALUES ('$salon', '$massage', '$body', '$date', '$start', '$end', '$status')"; 

    if (mysqli_query($mysqli, $i_query)) {
        header("Location: ../view/appointment_admin.php");
        exit();
    } else {
        echo "Error: " . $i_query . "<br>" . mysqli_error($mysqli);
    }
}else{
    // echo "jjjj";
}