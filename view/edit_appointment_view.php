<?php
include '../settings/core.php';
include '../actions/get_an_appointment_action.php';
include '../funtions/select.php';


check();

if (isset($_GET['EditID'])) {
    $did = $_GET['EditID'];
    $ret_var = return_appointment($did);
    print_r($ret_var);
} else {
    header('Location: ../view/appointment_admin.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Chore</title>

    <style>
         body {
            background-color: azure;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .add-container {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 300px
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input {
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="add-container">
        <h2>Edit Appointment</h2>
        <hr>
        <form id="Choreform" method="POST" action="../actions/edit_appointment_action.php?EditID=<?php echo $did; ?>" onsubmit=" return validateForm()">
            <input type="text" placeholder="Customer Name" id="Edit_an_appointment" readonly name="appointment" value="<?php echo $ret_var['f_name'] . ' ' . $ret_var['l_name'] ?>" >

            <label for="service">Select Service:</label>

            <select id="Salonname" name="Salonname" >
                <option value="" selected><?php echo $ret_var['Salon_name'] ?></option>
            <?php
            foreach (get_salon() as $result) {
                echo '<option value='.$result['Salon_ID'].'>'.$result['Salon_name'].'</option>';
                }
            ?>
            </select>

            <select id="Massagename" name="Massagename" >
            <option value="" selected><?php echo $ret_var['Massage_name'] ?></option>
            <?php
            foreach (get_massage() as $result) {
                echo '<option value='.$result['massage_ID'].'>'.$result['Massage_name'].'</option>';
                }
            ?>
            </select>

            <select id="bodyname" name="bodyname" >
            <option value="" selected><?php echo $ret_var['body_name'] ?></option>
            <?php
            foreach (get_facenbody() as $result) {
                echo '<option value='.$result['body_ID'].'>'.$result['body_name'].'</option>';
                }
            ?>
            </select>

            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" value="<?php echo $ret_var['Appointment_date'] ?>" required>

            <label for="time">Preferred Time:</label>
            <input type="time" id="time" name="time" value="<?php echo $ret_var['Start_time'] ?>" required>

            <label for="time">End Time:</label>
            <input type="time" id="End_time" name="End_time" required>

            <select id="status" name="status" >
            <option value="" selected><?php echo $ret_var['Status_name'] ?></option>
            <?php
            foreach (get_status() as $result) {
                echo '<option value='.$result['Status_ID'].'>'.$result['Status_name'].'</option>';
                }
            ?>
            </select>

            <input type="submit" name="submit" value="Edit Appointment">

        </form>
    </div>
    <script src="../js/script.js"></script>
</body>

</html>
<script>
    function validateForm() {
        var choreName = document.getElementById("Edit_an_appointment").value;
        if (choreName.trim() == "") {
            alert("Appointment must not be empty");
            return false;
        }
        return true;
    }
</script>