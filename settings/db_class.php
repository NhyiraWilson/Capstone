<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'oasis');
?>
<?php
// $mysqli = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

// // Check connection
// if ($mysqli -> connect_errno) {
//   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
//   die();
// }
?>

<?php
class db_connection {
    private $db;

    public function __construct() {
        $this->db = new mysqli("localhost", "root", "", "oasis");
        if ($this->db->connect_error) {
            die("Database connection failed: " . $this->db->connect_error);
        }
    }

    public function db_query($sql) {
        return $this->db->query($sql);
    }

    public function db_conn() {
        return $this->db; // Return the initialized mysqli object
    }

    public function escape_string($value) {
        return $this->db->real_escape_string($value);
    }
}
?>
