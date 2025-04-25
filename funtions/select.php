<?php
include_once '../settings/db_class.php';


function get_salon()
{
    global $mysqli;
    $sql = "SELECT * FROM Salon";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return[];
    }
    $mysqli->close();
}

function get_massage()
{
    global $mysqli;
    $sql = "SELECT * FROM massage";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return[];
    }
    $mysqli->close();
}

function get_facenbody()
{
    global $mysqli;
    $sql = "SELECT * FROM faceandbody";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return[];
    }
    $mysqli->close();
}

function get_status()
{
    global $mysqli;
    $sql = "SELECT * FROM status";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return[];
    }
    $mysqli->close();
}
?>