<?php
 class Database{
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'qlnhansu';

    private $conn = NULL ;
    private $result = NULL ;
    
       

    public function connect(){
        $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
        if(!$this->conn){
            echo "Ket noi that bai";
            exit();
        }
        else{
            mysqli_set_charset($this->conn, 'utf8');
            
        }
        echo " OK ";
        $this->write_to_console("OK");
        return $this->conn ;
    }
    function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
     }

    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this -> result;
    }

    public function insertData($hoten, $namsinh, $quequan){
        $sql = "INSERT INTO nhanvien(id,hoten,namsinh,quequan) VALUES (null,'$hoten','$namsinh','$quequan')";
        return $this->execute($sql);
    }
 }

?>