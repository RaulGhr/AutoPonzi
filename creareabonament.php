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
    <link rel="stylesheet" href="./creareabonament.css">

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
            $sql = "SELECT Username, Credite FROM users WHERE idusers = '$id' ";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
              
                while($row = $result->fetch_assoc()) {
                $user = $row["Username"];
                $credite = $row["Credite"];
                  
                      
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
                    <h1>Creare Abonament</h1>
                </div>
                <div class="abonamente">
                    <div class="mesaj">
                        <p class="">Atentie: Fiecare abonament necesita 1 credit</p>    
                    </div>
                    <div class="credite d-flex justify-content-center align-content-center">
                        <?php
                        echo '<p>Credite disponibile: '.$credite.'</p>';
                        ?>   
                        <button>+</button>                    
                    </div>

                    <form class="d-flex align-content-center justify-content-center flex-column" action="/includes/cabonament.inc.php" method="POST">
                        <div class="spate d-flex align-content-center justify-content-center flex-column">                           
                                                         
                            <div class="">
                                <div class="spate-input">
                                    <select class="form-control selectare" name="platforma" required>
                                        <option selected="" value="">Platforma</option>
                                        <option value="1">Pydamid</option>
                                        <option value="2">Asos</option>
                                        <option value="3">Alibaba</option>
                                    </select>    
                                </div>        
                                
                                <div class="spate-input">
                                    <input name="nume" class="form-control" placeholder="Username Platforma" type="text" required>
                                </div>
                                <div class="spate-input">
                                    <input name="parola" class="form-control" placeholder="Parola  Platforma" type="text" required>
                                </div>
                                <div class="spate-input">
                                    <input name="vip" class="form-control" placeholder="Nivel VIP" type="number" required>
                                </div>     
                            </div>                                                
                        </div>               
                        <div class="clasa-buton d-flex align-content-center justify-content-center">
                            <button type="submit" name="trimis" class="buton-submit">Submit</button>
                        </div>
                        <div class="eroare">
                            <p>
                                <?php
                                if(isset($_GET["error"])){
                                    if($_GET["error"] == "insfcredit"){
                                    echo "CREDITE INSUFICIENTE! VA RUGAM REINCARCATI CONTUL";
                                    }   
                                }
                                ?>    
                            </p>
                            
                        </div>
                    </form>
                </div>
                
            </div>
            
            

        </div>




    </section>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>