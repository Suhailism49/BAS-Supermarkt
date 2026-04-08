<?php
// auteur: studentnaam
// functie: klant verwijderen

require '../../vendor/autoload.php';
use Bas\classes\Klant;

$melding = "";

if (isset($_GET["klantId"])) {
    $id = $_GET["klantId"];

    $klant = new Klant();
    $result = $klant->delete($id);

    if ($result) {
        $melding = "Klant succesvol verwijderd.";
    } else {
        $melding = "Fout bij verwijderen van klant.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Klant - Delete</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Klant</h1>
<h2>Verwijderen</h2>

<p><?php echo $melding; ?></p>

<a href="read.php">Terug naar overzicht</a>

</body>
</html>



