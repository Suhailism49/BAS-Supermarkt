<?php
// auteur: studentnaam
// functie: klantgegevens bijwerken

require '../../vendor/autoload.php';
use Bas\classes\Klant;

$klant = new Klant();
$rij = null;
$melding = "";

if (isset($_POST["update"]) && $_POST["update"] == "Opslaan") {
    $klantId = $_POST["klantId"];
    $klantNaam = $_POST["klantNaam"];
    $klantEmail = $_POST["klantEmail"];

    $result = $klant->update($klantId, $klantNaam, $klantEmail);

    if ($result) {
        $melding = "Klant succesvol bijgewerkt.";
    } else {
        $melding = "Fout bij het bijwerken van klant.";
    }

    $rij = $klant->readOne($klantId);
}

if (isset($_GET["klantId"])) {
    $id = $_GET["klantId"];
    $rij = $klant->readOne($id);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Klant - Update</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Klant</h1>
<h2>Bewerken</h2>

<?php
if ($melding != "") {
    echo "<p>$melding</p>";
}
?>

<?php if ($rij) { ?>
<form method="post">
    <input type="hidden" name="klantId" value="<?php echo $rij['klantId']; ?>">

    <label for="nv">Klantnaam:</label>
    <input type="text" id="nv" name="klantNaam" value="<?php echo $rij['klantNaam']; ?>" required>
    <br>

    <label for="an">Klantemail:</label>
    <input type="email" id="an" name="klantEmail" value="<?php echo $rij['klantEmail']; ?>" required>
    <br><br>

    <input type="submit" name="update" value="Opslaan">
</form>
<?php } else { ?>
<p>Geen klant gevonden.</p>
<?php } ?>

<br>
<a href="read.php">Terug</a>

</body>
</html>
    }
?>