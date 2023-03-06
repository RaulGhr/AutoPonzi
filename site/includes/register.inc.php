<?php
if(isset($_POST["trimis"])){

    
        

        $nume=$_POST["nume"];
        $prenume=$_POST["prenume"];
        $username=$_POST["username"];
        $email=$_POST["email"];
        $telegram=$_POST["telegram"];
        $telefon=$_POST["telefon"];
        $pwd=$_POST["pwd"];
        $pwd2=$_POST["pwd2"];
        
        require_once 'db_connect.php';
        require_once 'functii.php';
        

        if(invalidEmail($email)!== false){
            header("location: ../register.php?error=invalidemail");
            exit;
        }
       
        if(pwdMatch($pwd,$pwd2)!== false){
            header("location: ../register.php?error=pwddontmatch");
            exit;
        } 
        if(existEmail($email,$conn)!== false){
            header("location: ../register.php?error=emailexistent");
            exit;
        }

        createUser($nume,$prenume,$username,$email,$telegram,$telefon,$pwd,$conn);










    

    
 

}
else{
    header("location: ../register.php");
}



