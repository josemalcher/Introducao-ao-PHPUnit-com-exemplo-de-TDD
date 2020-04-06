<?php

use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase
{
    public function testeAtributosCalculadora()
    {
        $this->assertClassHasAttribute('valorA', Calculadora::class);
        $this->assertClassHasAttribute('valorB', Calculadora::class);
        $this->assertClassHasAttribute('operador', Calculadora::class);
        $this->assertClassHasAttribute('resultado', Calculadora::class);
    }

    public function testMetodosCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, 'getValorA'), "Falta o método Get Resultado");
        $this->assertTrue(method_exists(Calculadora::class, 'getValorB'), "Falta o método Get Valor B");
        $this->assertTrue(method_exists(Calculadora::class, 'getOperador'), "Falta o método Operador");
        $this->assertTrue(method_exists(Calculadora::class, 'getResultado'), "Falta o método Resultado");
    }

}