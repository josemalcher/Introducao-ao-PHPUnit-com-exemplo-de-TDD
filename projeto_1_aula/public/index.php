<?php

require_once '../vendor/autoload.php';

use App\Calculadora;

$calc = new Calculadora(20, 30, "Soma");
echo $calc->getResultado();

echo "<hr>";

echo "5 + 5 = " . Calculadora::calcular(5, 5, "Soma");