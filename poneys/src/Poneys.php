<?php
/**
 * Gestion de poneys
 */
class Poneys
{
	private $_count = 8;

	/**
	 * Retourne le nombre de poneys
	 *
	 * @return integer
	 */
	public function getCount(): int
	{
		return $this->_count;
	}

	/**
	 * Défini le nombre de poneys
	 *
	 * @return void
	 */
	public function setCount(int $count): void
	{
		if ($count >= 0)
			$this->_count = $count;
	}

	/**
	 * Retire un poney du champ
	 *
	 * @param int $number Nombre de poneys à retirer
	 *
	 * @return void
	 */
	public function removePoneyFromField(int $number): void
	{
		if ($number < 0)
			throw new Exception("Negative removal of poneys", 1);
		if ($this->_count - $number < 0)
			throw new Exception("Negative count of poneys", 1);
		else
			$this->_count -= $number;
	}

	/**
	 * Ajoute un poney du champ
	 *
	 * @param int $number Nombre de poneys à ajouter
	 *
	 * @return void
	 */
	public function addPoneyFromField(int $number): void
	{
		$this->_count += $number;
	}

	/**
	 * Retourne les noms des poneys
	 *
	 * @return array
	 */
	public function getNames(): array
	{

	}

	/**
	 * Retourne si de la place est disponible dans le champ
	 *
	 * @return booléen
	 */
	public function hasEnougthSpace() : bool
	{
		return ($this->_count < 15) ? true : false;
	}

}
?>
