<?php

require_once '../vendor/autoload.php';

use App\Calculadora;

$calc = new Calculadora(20, 30, "Soma");
echo $calc->getResultado();

