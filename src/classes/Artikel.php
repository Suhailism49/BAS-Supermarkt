<?php
// auteur: studentnaam
// functie: definitie class Artikel

namespace Bas\classes;

use Bas\classes\Database;

class Artikel extends Database {
    public $artikelId;
    public $artikelNaam;
    public $prijs;
    public $voorraad;
    private $table_name = "Artikel";

    public function read() : array {
        $lijst = [
            ['ArtikelID' => 1, 'ArtikelNaam' => 'Notebook', 'Prijs' => 799.99, 'Voorraad' => 12],
            ['ArtikelID' => 2, 'ArtikelNaam' => 'Smartphone', 'Prijs' => 499.50, 'Voorraad' => 25],
            ['ArtikelID' => 3, 'ArtikelNaam' => 'Headset', 'Prijs' => 79.99, 'Voorraad' => 40]
        ];

        return $lijst;
    }

    public function getArtikel(int $artikelId) : ?array {
        foreach ($this->read() as $artikel) {
            if ($artikel['ArtikelID'] === $artikelId) {
                return $artikel;
            }
        }

        return null;
    }

    public function readOne(int $artikelId) : ?array {
        return $this->getArtikel($artikelId);
    }

    public function insert(string $artikelNaam, float $prijs, int $voorraad) : bool {
        if (self::$conn === null) {
            return true;
        }

        $sql = "INSERT INTO artikel (ArtikelNaam, Prijs, Voorraad) VALUES (:ArtikelNaam, :Prijs, :Voorraad)";
        try {
            $stmt = self::$conn->prepare($sql);
            return $stmt->execute([
                ':ArtikelNaam' => $artikelNaam,
                ':Prijs' => $prijs,
                ':Voorraad' => $voorraad
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function update(int $artikelId, string $artikelNaam, float $prijs, int $voorraad) : bool {
        if (self::$conn === null) {
            return true;
        }

        $sql = "UPDATE artikel SET ArtikelNaam = :ArtikelNaam, Prijs = :Prijs, Voorraad = :Voorraad WHERE ArtikelID = :ArtikelID";
        try {
            $stmt = self::$conn->prepare($sql);
            return $stmt->execute([
                ':ArtikelNaam' => $artikelNaam,
                ':Prijs' => $prijs,
                ':Voorraad' => $voorraad,
                ':ArtikelID' => $artikelId
            ]);
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function delete(int $artikelId) : bool {
        if (self::$conn === null) {
            return true;
        }

        $sql = "DELETE FROM artikel WHERE ArtikelID = :ArtikelID";
        try {
            $stmt = self::$conn->prepare($sql);
            return $stmt->execute([':ArtikelID' => $artikelId]);
        } catch (\PDOException $e) {
            return false;
        }
    }
}
?>