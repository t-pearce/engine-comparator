<?php

namespace Engine\Comparator\Types;

abstract class Comparators
{
	const EQUAL                 = "==";
	const NOT_EQUAL             = "!=";
	const IDENTICAL             = "===";
	const NOT_IDENTICAL         = "!==";
	const LESS_THAN             = "<";
	const LESS_THAN_OR_EQUAL    = "<=";
	const GREATER_THAN          = ">";
	const GREATER_THAN_OR_EQUAL = ">=";
	const IN_ARRAY              = "⊆";
	const NOT_IN_ARRAY          = "!⊆";
}