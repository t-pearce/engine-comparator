<?php

namespace Engine\Comparator\Types;

enum Comparators : string
{
	case EQUAL                 = "==";
	case NOT_EQUAL             = "!=";
	case IDENTICAL             = "===";
	case NOT_IDENTICAL         = "!==";
	case LESS_THAN             = "<";
	case LESS_THAN_OR_EQUAL    = "<=";
	case GREATER_THAN          = ">";
	case GREATER_THAN_OR_EQUAL = ">=";
	case IN_ARRAY              = ":";
	case NOT_IN_ARRAY          = "!:";
}