<?php
function invalidEmail($email){
    $result=false;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result=false;
    }

    return $result;
}



function pwdMatch($pwd,$pwd2){
    $result=false;
    if($pwd !== $pwd2){
        $result=true;
    }
    else{
        $result=false;
    }

    return $result;
}


function existEmail($email,$conn){
    $sql = "SELECT * FROM users WHERE Mail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfail");
        exit;
    }

    mysqli_stmt_bind_param($stmt,"s",$email);
    mysqli_stmt_execute($stmt);

    $resultsdata = mysqli_stmt_get_result($stmt);

    if($row =  mysqli_fetch_assoc($resultsdata)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);



}

function createUser($nume,$prenume,$username,$email,$telegram,$telefon,$pwd,$conn){
    $sql = "INSERT INTO users (Nume, Prenume, Username, Mail, Telegram, Telefon, Parola) VALUES(?, ?, ?, ?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        //header("location: ../register.php?error=stmtfail");
        echo "EROARE";
        exit;
    }
    

    mysqli_stmt_bind_param($stmt,"sssssss",$nume,$prenume,$username,$email,$telegram,$telefon,$pwd);
    mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    loginUS($email,$pwd,$conn);



}

function existPwp($pwp,$conn){
    $sql = "SELECT * FROM users WHERE Parola = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfail");
        exit;
    }

    mysqli_stmt_bind_param($stmt,"s",$pwp);
    mysqli_stmt_execute($stmt);

    $resultsdata = mysqli_stmt_get_result($stmt);

    if($row =  mysqli_fetch_assoc($resultsdata)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function loginUS($email,$pwd,$conn){
    $sql = "SELECT * FROM users WHERE Mail = ? AND Parola = ?;";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../login.php?error=stmtfail");
        exit;
    }

    mysqli_stmt_bind_param($stmt,"ss",$email,$pwd);
    mysqli_stmt_execute($stmt);

    $resultsdata = mysqli_stmt_get_result($stmt);

    if($row =  mysqli_fetch_assoc($resultsdata)){
        salvareId($email,$conn);
        header("location: ../formular.php");
        // header("location: ../test.php");
        exit;
    }
    else{
        header("location: ../login.php?error=emailsauparolaincorecta");
        exit;
    }

    mysqli_stmt_close($stmt);

    

}

function salvareId($email,$conn){
    session_start();
    
    $sql = "SELECT idusers FROM users WHERE Mail = '$email';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            $_SESSION["id"]=$row["idusers"];
        }
    } 
    $conn->close();
}

function creareAbonament($platforma,$nume,$parola,$vip,$conn){
    session_start();
    $id=$_SESSION["id"];
    date_default_timezone_set('Europe/Bucharest');
    $Date = date("Y-m-d");
    $sql = "INSERT INTO abonamente (platforma, username, parola, vip, users_idusers, incepereab) VALUES(?, ?, ?, ?, ?,'$Date');";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        echo "EROARE1";
        exit;
    }
    mysqli_stmt_bind_param($stmt,"issii",$platforma,$nume,$parola,$vip,$id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    $sql = "SELECT Credite FROM users WHERE idusers = '$id' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        $credite = $row["Credite"];              
        }
    }
    $credite=$credite-1;
    echo $id;
    $sql = "UPDATE users SET Credite = '$credite' WHERE idusers = '$id';";
    $conn->query($sql);

    header("location: ../formular.php");
    

}

function verificareCredite($conn){
    session_start();
    $id=$_SESSION["id"];
    $sql = "SELECT Credite FROM users WHERE idusers = '$id' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) { 
        while($row = $result->fetch_assoc()) {
        $credite = $row["Credite"];              
        }
        return $credite;
    }
}