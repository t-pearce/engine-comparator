<?php

namespace Engine\Comparator;

class Comparator
{
	private string $comparator;
	private mixed $objective;

	use \Engine\Traits\Creatable;

	public function check($target)
	{
		try
		{
			
			switch($this->comparator)
			{
				case \Engine\Comparator\Types\Comparators::EQUAL:
					return $target == $this->objective;
				case \Engine\Comparator\Types\Comparators::NOT_EQUAL:
					return $target != $this->objective;
				case \Engine\Comparator\Types\Comparators::GREATER_THAN:
					return $target > $this->objective;
				case \Engine\Comparator\Types\Comparators::GREATER_THAN_OR_EQUAL:
					return $target >= $this->objective;
				case \Engine\Comparator\Types\Comparators::LESS_THAN:
					return $target < $this->objective;
				case \Engine\Comparator\Types\Comparators::LESS_THAN_OR_EQUAL:
					return $target <= $this->objective;
				case \Engine\Comparator\Types\Comparators::IDENTICAL:
					return $target === $this->objective;
				case \Engine\Comparator\Types\Comparators::NOT_IDENTICAL:
					return $target !== $this->objective;
				case \Engine\Comparator\Types\Comparators::IN_ARRAY:
					return in_array($this->objective, $target);
				case \Engine\Comparator\Types\Comparators::NOT_IN_ARRAY:
					return !in_array($this->objective, $target);
			}
		}
		catch(\Exception $e)
		{
			throw new \LogicException("Could not check that the target compares to the objective.");
		}

		throw new \LogicException("Comparator {$this->comparator} not recognised");
	}

	public function setObjective(string $objective) : self
	{
		$this->objective = $objective;
	
		return $this;
	}
	public function setComparator(string $comparator) : self
	{
		$this->comparator = $comparator;
	
		return $this;
	}
}