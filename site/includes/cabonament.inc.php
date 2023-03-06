<?php
if(isset($_POST["trimis"])){

        $platforma=$_POST["platforma"];
        $nume=$_POST["nume"];
        $parola=$_POST["parola"];
        $vip=$_POST["vip"];
        
        
        require_once 'db_connect.php';
        require_once 'functii.php';
        

        if(verificareCredite($conn) < 1){
            header("location: ../creareabonament.php?error=insfcredit");
            exit;
        }
        echo verificareCredite($conn);
       

        
        creareAbonament($platforma,$nume,$parola,$vip,$conn);










    

    
 

}
else{
    header("location: ../register.php");
}



