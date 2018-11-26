<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
	protected $Poneys;

	protected function setUp()
	{
		$this->Poneys = new Poneys();
		$this->Poneys->setCount(8);
	}

	protected function tearDown()
	{
		unset($this->Poneys);
	}



	public function testRemovePoneyFromField()
	{
		// Action
		$this->Poneys->removePoneyFromField(3);

		// Assert
		$this->assertEquals(5, $this->Poneys->getCount());
	}

	public function testRemovePoneyFromFieldExceptionCount()
	{
		$this->expectExceptionMessage("Negative count of poneys");

		$this->Poneys->removePoneyFromField(9);
	}

	public function testRemovePoneyFromFieldExceptionNumber()
	{
		$this->expectExceptionMessage("Negative removal of poneys");

		$this->Poneys->removePoneyFromField(-1);
	}

	/**
	 * @dataProvider removeProvider
	 */
	public function testRemovePoneyFromFieldProvider($nbr, $expected)
	{
		$this->Poneys->removePoneyFromField($nbr);

		$this->assertEquals($expected, $this->Poneys->getCount());
	}

	public function testAddPoneyFromField()
	{
		// Action
		$this->Poneys->addPoneyFromField(3);

		// Assert
		$this->assertEquals(11, $this->Poneys->getCount());
	}

	/**
	 * @dataProvider spaceProvider
	 */
	public function testHasEnougthSpace($poneysToAdd, $expected)
	{
		$this->Poneys->addPoneyFromField($poneysToAdd);

		$this->assertEquals($expected, $this->Poneys->hasEnougthSpace());
	}

	/**
	 * @dataProvider setupProvider
	 */
	public function testSetUp($poneys, $expected)
	{
		$this->Poneys->setCount($poneys);

		$this->assertEquals($expected, $this->Poneys->getCount());
	}

	//################ MOCK ################

	public function testGetNames()
    {
        // Create a stub for the Poney class.
        $stub = $this->createMock(Poneys::class);

        // Configure the stub.
        $stub->method('getNames')
        	 ->willReturn([
					'Applejack',
					'Pinkie Pie',
					'Princesse Celestia',
					'Rainbow Dash',
					'Rarity',
					'Twilight Sparkle',
					'Fluttershy',
				]);

        $this->assertEquals([
			'Applejack',
			'Pinkie Pie',
			'Princesse Celestia',
			'Rainbow Dash',
			'Rarity',
			'Twilight Sparkle',
			'Fluttershy',
		], $stub->getNames());
    }

	//################ PROVIDERS ################

	public function removeProvider()
	{
		return [
			[0, 8],
			[1, 7],
		];
	}

	public function spaceProvider()
	{
		return [
			[0, true],
			[7, false],
		];
	}

	public function setupProvider()
	{
		return [
			[0, 0],
			[7, 7],
			[-1, 8],
		];
	}
}
?>
