<?php
 if (isset($_GET['action'])){
    $action = $_GET['action'];
 }
 else{
    $action = '';
 }
 function write_to_console($data) {
   $console = $data;
   if (is_array($console))
   $console = implode(',', $console);
  
   echo "<script>console.log('Console: " . $console . "' );</script>";
}

 switch ($action) {
    case 'add':{
        if(isset($_POST['add_nhanvien'])){
           $hoten = $_POST['hoten'];
           write_to_console($hoten);
           
           $namsinh = $_POST['namsinh'];
           write_to_console($namsinh);
           
           $quequan = $_POST['quequan'];
           write_to_console($quequan);
           

          $db->insertData($hoten, $namsinh, $quequan);


        }
        require_once('View/nhanvien/add_nhanvien.php'); 
        break;
    }
    case 'test':{
      if(isset($_POST['test_array'])){
         $el = $_POST['newelement'];
         write_to_console($el);
         $db->getListIDNVV() ;        
         //write_to_console($arr);         
         //$db->insertElementArr($el);
      }
      require_once('View/nhanvien/test_array.php'); 
      break;

    }

    case 'edit':{
      require_once('View/nhanvien/edit_nhanvien.php'); 
      break;
    }

    default:{
      require_once('View/nhanvien/list.php');
      break;
    }
 }
?>