<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class NewTest extends TestCase
{
	protected $Poneys;

	protected function setUp()
	{
		$this->Poneys = new Poneys();
		$this->Poneys->setCount(10);
	}

	protected function tearDown()
	{
		unset($this->Poneys);
	}

	public function testAddPoneyFromField()
	{
		// Action
		$this->Poneys->addPoneyFromField(3);

		// Assert
		$this->assertEquals(13, $this->Poneys->getCount());
	}
}

?>