<?php
// auteur: studentnaam
// functie: unitests class Artikel

use PHPUnit\Framework\TestCase;
use Bas\classes\Artikel;

// Filename moet gelijk zijn aan de classname ArtikelTest
class ArtikelTest extends TestCase{

	protected $artikel;

    protected function setUp(): void {
        $this->artikel = new Artikel();
    }

	// Methods moeten starten met de naam test....
	public function testRead(){
		$artikelen = $this->artikel->read();
        $this->assertIsArray($artikelen);
		$this->assertTrue(count($artikelen) > 0, "Aantal moet groter dan 0 zijn");
	}

	public function testGetArtikel(){
		$artikelId = 1; // check of dit ook echt in de database bestaat!
		$artikel = $this->artikel->getArtikel($artikelId);
		$this->assertEquals($artikelId, $artikel['ArtikelID']);
	}

	public function testInsert(){
		$result = $this->artikel->insert(
			"Test Artikel",
			99.99,
			10
		);

		$this->assertTrue($result);
	}

	public function testUpdate(){
		$artikelId = 1;
		$artikelNaam = "Updated Artikel";
		$prijs = 149.99;
		$voorraad = 5;
		$result = $this->artikel->update($artikelId, $artikelNaam, $prijs, $voorraad);
		$this->assertTrue($result);
	}

	public function testDelete(){
		$artikelId = 1;
		$result = $this->artikel->delete($artikelId);
		$this->assertTrue($result);
	}

}

?>