<?php

class Unit {

	private $id;
	private $name;
	private $quantity;
	private $referenceUnit;

	const CONVERTION_PRECISION = 2;

	/**
	*	constructor, getters, setters 
	*/


	/**
	* Works with a unique root for every Unit
	* Here it's => gram
	*/
	public function getRootUnitQuantity(): int {
		if (null == $this->referenceUnit)
			return 1;

		return $this->quantity * $this->referenceUnit->getRootUnitQuantity();
	}

	public static function convertUnit(Unit $unitA, Unit $unitB): float {
		return round($unitA->getRootUnitQuantity() / $unitB->getRootUnitQuantity(), self::CONVERTION_PRECISION);
	}

}