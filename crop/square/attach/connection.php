<?php
// Connection Class
class db{
// Connection Variables
public $conn;
public $dsn = "mysql:host=localhost; dbname=YOUR_DATABASE_NAME";
public $db_user = "YOUR_DATABASE_USERNAME";
public $db_pass = "YOUR_DATABASE_PASSWORD";
// Auto Call Construct Function
public function __construct(){
    // Connection
    try{
        $this->conn = new PDO($this->dsn, $this->db_user, $this->db_pass);
        // Set Errot Mode
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $c){
        echo("Connection Error");
    }
// End Connection
}
// End Class
}

?>
