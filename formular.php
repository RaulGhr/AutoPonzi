<?php
session_start();
$id = $_SESSION["id"];
if(!isset($_SESSION["id"])){
    header("location: ../index.php");
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="./formular.css">

    <!-- Fonturi -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&display=swap" rel="stylesheet">

    <title>Formular</title>
</head>
<body>
    <div class="bara-sus d-flex justify-content-between">
        <div class="uname align-self-start">
            <?php
            include "./includes/db_connect.php";
            $sql = "SELECT Username FROM users WHERE idusers = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                $user = $row["Username"];
                  
                      
                }
              }
            else{
                session_unset();
                session_destroy();
                header("location: ../index.php");
                exit();
            }
            echo'<h1 class="">'.$user.'</h1>'; 
            $conn->close();
            ?>
            
        </div>
        <div class="logout-img align-self-end">
            <img src="./imagini/logout-img.png" alt="" onclick="window.location.href='/includes/logOut.php'">
        </div>
    </div>
    <section class="cover">
        <img class="imagine-bg" src="./imagini/formular imagine.jpg" alt="">
        <div class="d-flex justify-content-center align-content-center">
            
            <div class="spate">
                <div class="titlu justify-content-center align-content-center">
                    <h1>Abonamentele tale</h1>
                </div>
                <div class="abonamente">

                <?php

                include "./includes/db_connect.php";

                $sql = "SELECT * FROM abonamente JOIN users ON users.idusers = abonamente.users_idusers WHERE users_idusers='$id'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        
                            switch ($row["platforma"]) {
                                case 1:
                                    $platforma='ASOS';
                                    break;
                                case 2:
                                    $platforma='Pydamid';
                                    break;
                            }
                            switch ($row["stare"]) {
                                case 0:
                                    $stare='Pauza';
                                    break;
                                case 1:
                                    $platforma='Activ';
                                    break;
                                case 2:
                                    $platforma='Eroare';
                                    break;
                            }
                            switch ($row["executat"]) {
                                case 0:
                                    $executat='Nu';
                                    break;
                                case 1:
                                    $executat='Da';
                                    break;
                            }                                
                            echo '
                                <div class="abonament d-flex justify-content-between">
                                    <div class="st">
                                        <p>Platforma: '.$platforma.'</p>
                                        <p>Username: '.$row["username"].'</p>
                                        <p>Data activare: '.$row["incepereab"].'</p>
                                        <p>Rulat azi: '.$executat.'</p>
                                        <p>Status: '.$stare.'</p>  
                                    </div>
                                      
                                </div> 
                            ';                     
                        }
                        
                
                }
                
                ?>
                    <!-- <div class="abonament d-flex justify-content-between">
                        <div class="st">
                            <p>Platforma: ASOS</p>
                            <p>Username: IRaulHD</p>
                            <p>Data activare: data</p>
                            <p>Rulat azi: Da</p>
                            <p>Status: Activ</p>  
                        </div>
                        <div class="dr d-flex justify-content-center align-content-center flex-column">
                            <p>PAUZA</p>
                        </div>   
                    </div> -->
                    <div onclick="window.location.href='creareabonament.php'" class="abonament addbtn">
                        <h1>+</h1>                      
                    </div>
                </div>
                
            </div>
            
            

        </div>




    </section>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>