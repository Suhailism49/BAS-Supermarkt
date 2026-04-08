<?php
// auteur: studentnaam
// functie: unitests class Klant

use PHPUnit\Framework\TestCase;
use Bas\classes\Klant;

// Filename moet gelijk zijn aan de classname KlantTest
class KlantTest extends TestCase{
    
	protected $klant;

    protected function setUp(): void {
        $this->klant = new Klant();
    }

	// Methods moeten starten met de naam test....
	public function testgetKlanten(){
		$klanten = $this->klant->getKlanten();
        $this->assertIsArray($klanten);
		$this->assertTrue(count($klanten) > 0, "Aantal moet groter dan 0 zijn");
	}

	public function testGetKlant(){
		$klantId = 1; // check of dit ook echt in de database bestaat!
		$klant = $this->klant->getKlant($klantId);
		$this->assertEquals($klantId, $klant['klantId']);
	}

	public function testInsert(){
		$result = $this->klant->insert(
			"Test",
			"Gebruiker",
			"test@email.nl",
			"0612345678"
		);

		$this->assertTrue($result);
	}
	
	public function testSearch(){
		$klantnaam = "Test";
		$resultaten = $this->klant->search($klantnaam);
		$this->assertIsArray($resultaten);
		$this->assertTrue(count($resultaten) > 0, "Moet resultaten vinden voor 'Test'");
		foreach ($resultaten as $rij) {
			$this->assertArrayHasKey('klantId', $rij);
			$this->assertArrayHasKey('klantNaam', $rij);
			$this->assertArrayHasKey('klantEmail', $rij);
		}
	}
	
	public function testUpdate(){
		$klantId = 1;
		$klantNaam = "Updated Test";
		$klantEmail = "updated@test.com";
		$result = $this->klant->update($klantId, $klantNaam, $klantEmail);
		$this->assertTrue($result);
	}
	
	public function testDelete(){
		$klantId = 1;
		$result = $this->klant->delete($klantId);
		$this->assertTrue($result);
	}
	
}
	
?>