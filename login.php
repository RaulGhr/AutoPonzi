<?php
session_start();
session_unset();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <!-- CSS -->
    <link rel="stylesheet" href="login.css">
    
    <title>Log in</title>
</head>
<body>
 
    

<section class="cover ">

<img class="imagine-bg" src="./imagini/login image.jpg" alt="">

<div class="login d-flex align-content-center justify-content-center flex-column">
    <h1 class="titlu">Log in</h1>
    <form action="/includes/login.inc.php" method="POST">
        
        <div class="spate-input">
            <input name="email" class="form-control" placeholder="Email" type="email" required>
        </div>
        <div class="spate-input">
            <input name="pwd" class="form-control" placeholder="Parola" type="password" required>
        </div>
        <div class="spate-input">
            <button type="submit" name="trimis" class="buton-login">Log in</button>
        </div>
        <div class="spate-input">
            <p class="msg-eroare">
                <?php
                    if(isset($_GET["error"])){
                        if($_GET["error"] == "invalidemail"){
                          echo "Mail Invalid";
                        }
                        if($_GET["error"] == "invalidepwd"){
                            echo "Parola Invalida";
                        }
                        if($_GET["error"] == "emailsauparolaincorecta"){
                            echo "Datele de intrare sunt invalide";
                        }


                    }
                    
            
            
            
                ?>
            </p>    
        </div>
                                                      
    </form>
</div>



</section>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>