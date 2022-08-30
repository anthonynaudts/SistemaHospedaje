<?php
    include("consultas.php");
    session_start();    
    $url= $_SERVER["REQUEST_URI"];  
     
    if($url == '/' || $url == 'index' || $url == 'index.php'){
        if(isset($_SESSION['session_id'])){
            header("Location: tablero");
        }
    }else{
        if(!isset($_SESSION['session_id'])){
            header("Location: /");
        }
    }
    
?>