<?php
$servername = "localhost";
$username = "kevin";
$password = "";
$dbname = "traqueurs";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO utilisateur (mdp, nom, email, statut)
VALUES ('0000', 'Admin', 'admin@test.com', 'Administrateur')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
