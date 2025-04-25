<?php
include '../actions/get_all_appointments.php';


function buildCell() 
{
    $results= get_appointments();
    foreach ($results as $result) {
        echo "
        <tr>
            <td>".$result["Appointment_ID"]."</td>
            <td>".$result["Salon_name"]."</td>
            <td>".$result["Massage_name"]."</td>
            <td>".$result["body_name"]."</td>
            <td>".$result["Staff_ID"]."</td>
            <td>".$result["User_ID"]."</td>
            <td>".$result["Appointment_date"]."</td>
            <td>".$result["Start_time"]."</td>
            <td>".$result["End_time"]."</td>
            <td>".$result["Appointment_status"]."</td>
            <td>
                <a href='../admin/edit_chore_view.php?EditID=". $result['Appointment_ID']."'>Edit</a>
                <a href='../action/delete_chore_action.php?delid=". $result['Appointment_ID']."'>Delete</a>
            </td>
        </tr>
        ";
      }
}
