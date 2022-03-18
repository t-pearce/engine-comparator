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
					return $this->processContains($target, $this->objective);
				case \Engine\Comparator\Types\Comparators::NOT_IN_ARRAY:
					return !$this->processContains($target, $this->objective);
			}
		}
		catch(\Exception $e)
		{
			throw new \LogicException("Could not check that the target compares to the objective.");
		}

		throw new \LogicException("Comparator {$this->comparator} not recognised");
	}

	private function processContains($target, $objective)
	{
		if(is_array($target))
			return in_array($target, $objective);
		else if(is_string($target))
			return strpos(strtolower($target), strtolower($objective)) !== false;

		throw new \LogicException("Targets of type " . gettype($target) . " cannot be processed as containing something");
	}

	public function setObjective($objective) : self
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