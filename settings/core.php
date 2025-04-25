<?php
session_start();

function check()
{
if(isset($_SESSION['User_ID'])) {
    return True;
} else {
    header("Location: ../view/login.php");
    die();
}
}

function get_user_roles() {
    if (isset($_SESSION['Role_ID'])) {
        return $_SESSION['Role_ID'];
    }
    else {
        header ("Location: ../view/login.php");
        exit();
    }
}
?>