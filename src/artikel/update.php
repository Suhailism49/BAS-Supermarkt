<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$artikel = new Artikel();
$rij = null;
$message = "";

if (isset($_POST["update"]) && $_POST["update"] == "Opslaan") {
    $artikelID = $_POST["artikelID"];
    $artikelNaam = $_POST["artikelnaam"];
    $prijs = $_POST["prijs"];
    $voorraad = $_POST["voorraad"];

    $result = $artikel->update($artikelID, $artikelNaam, $prijs, $voorraad);

    if ($result) {
        $message = "Artikel succesvol bijgewerkt.";
    } else {
        $message = "Fout bij bijwerken van artikel.";
    }

    $rij = $artikel->readOne($artikelID);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $rij = $artikel->readOne($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Artikel - Bewerken</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Artikel</h1>
<h2>Bewerken</h2>

<?php
if ($message != "") {
    echo "<p>$message</p>";
}
?>

<?php if ($rij) { ?>
<form method="post">
    <input type="hidden" name="artikelID" value="<?php echo $rij['ArtikelID']; ?>">

    <label for="an">Artikelnaam:</label>
    <input type="text" id="an" name="artikelnaam" value="<?php echo $rij['ArtikelNaam']; ?>" required>
    <br>

    <label for="pr">Prijs:</label>
    <input type="number" step="0.01" id="pr" name="prijs" value="<?php echo $rij['Prijs']; ?>" required>
    <br>

    <label for="vr">Voorraad:</label>
    <input type="number" id="vr" name="voorraad" value="<?php echo $rij['Voorraad']; ?>" required>
    <br><br>

    <input type="submit" name="update" value="Opslaan">
</form>
<?php } else { ?>
<p>Geen artikel gevonden.</p>
<?php } ?>

<br>
<a href="read.php">Terug</a>

</body>
</html>