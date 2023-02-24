<?php 

class Database {
    //DB parameters

    private $host = 'localhost:3307';
    private $db_name = 'myblog';
    private $username = 'root';
    private $password = '';
    private $con;
    //DB connect

    public function connect() {
        $this->con = null;
try {
    $this->con = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
    $this->con->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
} catch (PDOException $th) {
    
    echo "Fucking Connection Error: " .$th->getMessage();
}
return $this->con;

    }
}

?>