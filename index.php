<?php
 include "Model/DBConfig.php";
 $db = new Database ;
 $db->connect();

 if (isset($_GET['controller'])){
    $controller = $_GET['controller'];
 }
 else{
    $controller = '';
 }

 switch ($controller) {
    case 'nhanvien':{
        require_once('Controller/nhanvien/index.php');
        break; 
    }
    case 'quanli':{
        require_once('Controller/quanli/index.php');
        break;
    }
 }

?>