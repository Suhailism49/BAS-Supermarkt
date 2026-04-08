<?php
require '../../vendor/autoload.php';
use Bas\classes\Artikel;

$artikel = new Artikel();
$resultaten = $artikel->read();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Artikel - Overzicht</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Artikel</h1>
<h2>Overzicht</h2>

<nav>
    <a href='../index.html'>Home</a><br>
    <a href='insert.php'>Nieuw artikel toevoegen</a><br><br>
</nav>

<table border="1" cellpadding="5">
    <tr>
        <th>Artikelnaam</th>
        <th>Prijs</th>
        <th>Voorraad</th>
        <th>Actie</th>
    </tr>

    <?php foreach ($resultaten as $rij) { ?>
    <tr>
        <td><?php echo $rij['ArtikelNaam']; ?></td>
        <td><?php echo $rij['Prijs']; ?></td>
        <td><?php echo $rij['Voorraad']; ?></td>
        <td>
            <a href="update.php?id=<?php echo $rij['ArtikelID']; ?>">Wijzigen</a>
            |
            <a href="delete.php?id=<?php echo $rij['ArtikelID']; ?>">Verwijderen</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>