<?php
require_once("../settings/db_class.php");


class general_class extends db_connection
{
	public function add_spa($spa_name,$description,$location,$contact_phone, $email, $subscription_type){
		$ndb = new db_connection();	
        $spa_name = mysqli_real_escape_string($ndb->db_conn(), $spa_name);
        $description = mysqli_real_escape_string($ndb->db_conn(), $description);
        $location = mysqli_real_escape_string($ndb->db_conn(), $location);
        $contact_phone = mysqli_real_escape_string($ndb->db_conn(), $contact_phone);
        $email = mysqli_real_escape_string($ndb->db_conn(), $email);
        $subscription_type = mysqli_real_escape_string($ndb->db_conn(), $subscription_type);
    
        $fee = ($subscription_type === 'customization') ? 120 : 80;
    
        $query = "INSERT INTO spas (spa_name, description, location, contact_phone, email, subscription_type, fee) 
                  VALUES ('$spa_name', '$description', '$location', '$contact_phone', '$email', '$subscription_type', '$fee')";    
		return $this->db_query($query);
   }

   public function delete_spa($spa_id){
        $db = new db_connection();
        $conn = $db->db_conn();

        if (!$conn) {
            return false;
        }

        $spa_id = $conn->real_escape_string($spa_id); // Sanitize input to prevent SQL injection
        $query = "DELETE FROM spas WHERE spa_id = '$spa_id'";
        $result = $conn->query($query);
        return $result; // Return true on success, false on failure
    }
    
   public function show_spa(){
    $ndb = $this->db_conn(); 
    $sql = "SELECT * FROM spas";
    $result = $ndb->query($sql);
    $spas = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $spas[] = $row;
        }
    }
    return $spas;
    }

    public function update_spa($spa_id, $spa_name, $description, $location, $contact_phone, $email, $subscription_type, $status) {
        $db = $this->db_conn();
        
        $spa_id = $db->real_escape_string($spa_id);
        $spa_name = $db->real_escape_string($spa_name);
        $description = $db->real_escape_string($description);
        $location = $db->real_escape_string($location);
        $contact_phone = $db->real_escape_string($contact_phone);
        $email = $db->real_escape_string($email);
        $subscription_type = $db->real_escape_string($subscription_type);
        $status = $db->real_escape_string($status);
    
        $query = "UPDATE spas 
                  SET spa_name = '$spa_name', description = '$description', location = '$location', 
                      contact_phone = '$contact_phone', email = '$email', 
                      subscription_type = '$subscription_type', status = '$status' 
                  WHERE spa_id = '$spa_id'";
    
        return $db->query($query);
    }
    
}

?>