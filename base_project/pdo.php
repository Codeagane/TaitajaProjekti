<?php
// Tiedot tietokantaan yhdistämistä varten
$servername = "userl18.taitaja2023.louhi.net";
$username = "userl18taitaja20";
$password = "PerunA312";

// Ohjelma yrittää yhdistää tietokantaan
try {
  $conn = new PDO("mysql:host=$servername;dbname=userl18taitaja20_semifinaali", $username, $password);
  // Antaa eri viestin, jos yhteys ei toimi
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Yhteydessä häikkää: " . $e->getMessage();
}
?>
