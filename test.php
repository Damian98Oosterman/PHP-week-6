<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blank";
$d = 12;

try {
$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
$voornaam = $_POST['voornaam'];
$achternaam = $_POST['achternaam'];
$sql = $conn->prepare("INSERT INTO blank (voornaam, achternaam)");
echo $voornaam, $achternaam;
$sql->bindParam(':voornaam', $voornaam);
$sql->bindParam(':achternaam', $achternaam);
$sql->execute();
$sql = $conn->prepare("SELECT * FROM blank");
$sql->execute();

var_dump($sql->fetchAll(PDO::FETCH_ASSOC));
while($row = $sql->fetchAll(PDO::FETCH_ASSOC)) {
    print $row['voornaam'] + '\n';
    print $row['achternaam'] + '\n';
$conn = null;
}
}

catch(PDOException $e)
{
echo "Connection failed: \n" . $e->getMessage();
}
?>
