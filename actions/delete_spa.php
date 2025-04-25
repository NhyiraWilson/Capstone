<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php
require_once("../controllers/add_spa_ctr.php");

if (isset($_GET['spa_id'])) {
    $spa_id = $_GET['spa_id'];

    $deletespa = delete_spa_ctr($spa_id); 

    if($deletespa !== false){
        header("Location: ../view/bubble_dashboard.php");
        exit;  
    } else {
        echo "Error deleting Spa";
    }
} else {
    echo "No Spa ID provided.";
}
?>