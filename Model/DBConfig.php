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
        $this->console_log('Ket noi DB OK: ',$this->conn);
        return $this->conn ;
    }
    public function write_to_console($data) {
        $console = $data;
        if (is_array($console))
        $console = implode(',', $console);
       
        echo "<script>console.log('Console: " . $console . "' );</script>";
     }
    public function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }

    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this -> result;
        // $rs = $this->conn->query($sql);
        // $nv = mysqli_fetch_all($rs,MYSQLI_ASSOC);
        // mysqli_free_result($rs);
        // return $nv ;
    }

    public function insertData($hoten, $namsinh, $quequan){
        $sql = "INSERT INTO nhanvien(id,hoten,namsinh,quequan) VALUES (null,'$hoten','$namsinh','$quequan')";
        $rs = $this->execute($sql);
        return $this->console_log($rs);
        //return $this->execute($sql);
    }

    public function getListIDNV(){
        $sql = "SELECT * FROM nhanvien WHERE namsinh = 1999 ";
        $rs = mysqli_query($this->connect(),$sql);
        // return $this->console_log($rs);
        $nv = mysqli_fetch_all($rs,MYSQLI_ASSOC);
        mysqli_free_result($rs);
        
        return $this->console_log($nv);
    }

    public function getListIDNVV(){
        $sql = "SELECT * FROM shift_nv WHERE ngay = 707 ";
        return $this->execute($sql);
    }



    // public function insertElementArr($el){
    //     $arr = $this->getListIDNV();

    //     $sql = "UPDATE shift_nv SET list_id_nv = '' WHERE ngay = '707' ";//bien new_arr la mang moi sau khi them 1 element
    //     return $this->execute($sql);

    // }
 }

?>