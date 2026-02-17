<?php

namespace PROJETO\Helpers;

class VerificationFieldsHelper
{
    public static function vericandoCamposPreenchidos($a, $b, $c)
    {
        if ($a !== null && $b !== null && $c !== null) {
            return true;
        } else {
            return false;
        }
    }
}
