<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$message = "";

if (isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen") {
    $artikelNaam = $_POST["artikelnaam"];
    $prijs = $_POST["prijs"];
    $voorraad = $_POST["voorraad"];

    $artikel = new Artikel();
    $result = $artikel->insert($artikelNaam, $prijs, $voorraad);

    if ($result) {
        $message = "Artikel succesvol toegevoegd.";
    } else {
        $message = "Fout bij toevoegen van artikel.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Artikel - Toevoegen</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Artikel</h1>
<h2>Toevoegen</h2>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<form method="post">
    <label for="an">Artikelnaam:</label>
    <input type="text" id="an" name="artikelnaam" placeholder="Artikelnaam" required>
    <br>

    <label for="pr">Prijs:</label>
    <input type="number" step="0.01" id="pr" name="prijs" placeholder="Prijs" required>
    <br>

    <label for="vr">Voorraad:</label>
    <input type="number" id="vr" name="voorraad" placeholder="Voorraad" required>
    <br><br>

    <input type="submit" name="insert" value="Toevoegen">
</form>

<br>
<a href="read.php">Terug</a>

</body>
</html>