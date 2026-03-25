<?php
// auteur: studentnaam
// functie: insert klant

require '../../vendor/autoload.php';
use Bas\classes\Klant;

$message = "";

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen"){

    // waarden ophalen uit formulier
    $klantnaam = $_POST["klantnaam"];
    $klantemail = $_POST["klantemail"];

    // object maken
    $klant = new Klant();

    // insert uitvoeren
    $result = $klant->insert($klantnaam, $klantemail);

    // melding tonen
    if($result){
        $message = "Klant succesvol toegevoegd!";
    } else {
        $message = "Fout bij toevoegen klant.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD Klant</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>CRUD Klant</h1>
<h2>Toevoegen</h2>

<?php
// melding tonen
if($message != ""){
    echo "<p>$message</p>";
}
?>

<form method="post">

<label for="nv">Klantnaam:</label>
<input type="text" id="nv" name="klantnaam" placeholder="Klantnaam" required/>
<br>

<label for="an">Klantemail:</label>
<input type="email" id="an" name="klantemail" placeholder="Klantemail" required/>
<br><br>

<input type='submit' name='insert' value='Toevoegen'>

</form>

<br>
<a href='read.php'>Terug</a>

</body>
</html>