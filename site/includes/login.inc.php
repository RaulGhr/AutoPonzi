<?php
if(isset($_POST["trimis"])){

    $email=$_POST["email"];
    $pwd=$_POST["pwd"];
    
    
    require_once 'db_connect.php';
    require_once 'functii.php';
    

    if(existEmail($email,$conn)== false){
        header("location: ../login.php?error=invalidemail");
        exit;
    }
    if(existPwp($pwd,$conn)== false){
        header("location: ../login.php?error=invalidepwd");
        exit;
    }

    
    loginUS($email,$pwd,$conn);

}
else{
    header("location: ../login.php");
}



