<?php
session_start();

unset( $_SESSION['User_ID']);
unset( $_SESSION['Role_ID']);

header("Location: ../view/login.php");

exit();