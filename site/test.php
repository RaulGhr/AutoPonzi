<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>
<?php

// include "./includes/db_connect.php";

// $sql = "SELECT Email FROM users";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//     echo "Email: " . $row["Email"]. "<br>";
//   }
// } else {
//   echo "0 results";
// }
// $conn->close();

// $email="rua@yh.com";

// include_once './includes/db_connect.php';
// $sql = "SELECT * FROM users WHERE Email = ?;";
// $stmt = mysqli_stmt_init($conn);
// if(!mysqli_stmt_prepare($stmt, $sql)){
//     header("location: ../register.php?error=stmtfail");
//     exit;
// }

// mysqli_stmt_bind_param($stmt,"s",$email);
// mysqli_stmt_execute($stmt);

// $resultsdata = mysqli_stmt_get_result($stmt);

// if($row =  mysqli_fetch_assoc($resultsdata)){
//     echo "este";
// }
// else{
//     echo "nu este";
// }

// mysqli_stmt_close($stmt);

// include_once './includes/db_connect.php';
// $email="raul.gherman2804@gmail.com";
// $pwd="cevasafie";
// $sql = "SELECT * FROM users WHERE Email = ? OR Parola = ?;";
// $stmt = mysqli_stmt_init($conn);
// if(!mysqli_stmt_prepare($stmt, $sql)){
//     header("location: ../login.php?error=stmtfail");
//     exit;
// }

// mysqli_stmt_bind_param($stmt,"ss",$email,$pwd);
// mysqli_stmt_execute($stmt);

// $resultsdata = mysqli_stmt_get_result($stmt);

// if($row =  mysqli_fetch_assoc($resultsdata)){
//     header("location: ../formular.php");
//     exit;
// }
// else{
//     header("location: ../login.php?error=emailsauparolaincorecta");
//     exit;
// }

// mysqli_stmt_close($stmt);




?>
</h1>
    
</body>
</html>

