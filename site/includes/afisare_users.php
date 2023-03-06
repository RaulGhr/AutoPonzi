<?php
$sql = "SELECT NR, Nume, Parola FROM DBtest";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["NR"]. "  Name: " . $row["Nume"]. " " . $row["Parola"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>