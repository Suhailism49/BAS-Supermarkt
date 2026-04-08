<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$message = "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $artikel = new Artikel();
    $result = $artikel->delete($id);

    if ($result) {
        $message = "Artikel succesvol verwijderd.";
    } else {
        $message = "Fout bij verwijderen van artikel.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Artikel - Verwijderen</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Artikel</h1>
<h2>Verwijderen</h2>

<p><?php echo $message; ?></p>

<a href="read.php">Terug naar overzicht</a>

</body>
</html>