<?php
include_once '../settings/db_class.php';
 
function get_appointments()
{
    global $mysqli;
    $sql = "SELECT * FROM appointment";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
        $get_appointment= mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $get_appointment;
    } else {
        return[];
    }
    $mysqli->close();

}
