<?php
// auteur: studentnaam
// functie: zoeken op klantnaam

require '../../vendor/autoload.php';
use Bas\classes\Klant;

$resultaten = [];

if (isset($_GET["zoeken"]) && $_GET["zoeken"] == "Zoeken") {
    $klantnaam = $_GET["klantnaam"];

    $klant = new Klant();
    $resultaten = $klant->search($klantnaam);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Klant - Zoeken</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Klant</h1>
<h2>Zoeken</h2>

<form method="get">
    <label for="nv">Klantnaam:</label>
    <input type="text" id="nv" name="klantnaam" placeholder="Klantnaam" required>
    <input type="submit" name="zoeken" value="Zoeken">
</form>

<br>

<?php
if (isset($_GET["zoeken"])) {
    if (!empty($resultaten)) {
        foreach ($resultaten as $rij) {
            echo $rij["klantId"] . " - " . $rij["klantNaam"] . " - " . $rij["klantEmail"] . "<br>";
        }
    } else {
        echo "Geen klanten gevonden.";
    }
}
?>

<br>
<a href="read.php">Terug</a>

</body>
</html>