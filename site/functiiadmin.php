<?php
session_start();
$id = $_SESSION["id"];
if(!isset($_SESSION["id"])){
    header("location: ../index.php");
}
if($_SESSION["id"]!=1){
    header("location: ../index.php");
}
if(isset($_POST["trimisnume"])){
    if(isset($_POST["nume"])&&isset($_POST["prenume"])){

    }
    else if(isset($_POST["nume"])){

    }
    else if(isset($_POST["prenume"])){

    }
}