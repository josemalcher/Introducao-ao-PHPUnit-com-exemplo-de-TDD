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

    /**
     * @depends testeAtributosCalculadora
     *
     *
     */

    public function testMetodosCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, 'getValorA'), "Falta o método Get Resultado");
        $this->assertTrue(method_exists(Calculadora::class, 'getValorB'), "Falta o método Get Valor B");
        $this->assertTrue(method_exists(Calculadora::class, 'getOperador'), "Falta o método Operador");
        $this->assertTrue(method_exists(Calculadora::class, 'getResultado'), "Falta o método Resultado");
    }

    /**
     * @depends testeAtributosCalculadora
     */
    public function testConstrutorCalculadora()
    {
        $this->assertTrue(method_exists(Calculadora::class, '__construct'), "Falta o método construtor em Calculadora");

        // verifica se está atribuindo valores
        $calc = new Calculadora(4, 2, "soma");
        $this->assertEquals(4, $calc->getValorA(), "Erro no método getValorA");
        $this->assertEquals(2, $calc->getValorB(), "Erro no método getValorB");
        $this->assertEquals("soma", $calc->getOperador(), "Erro no Operador");

        //Acesso aos atributos privados
        //$this->assertFalse(isset($calc->valorA), "ATRIBUTO DEVE SER PRIVADO");
        //$this->assertFalse(isset($calc->valorB), "ATRIBUTO DEVE SER PRIVADO");
        //$this->assertFalse(isset($calc->operador), "ATRIBUTO DEVE SER PRIVADO");

    }

    /**
     * @depends testConstrutorCalculadora
     * */
    public function testGetResultadoCalculadore()
    {
        $calc = new Calculadora(4, 2, "Soma");
        $this->assertEquals(6, $calc->getResultado(), "ERRO no método getResultado");

        $calc = new Calculadora(3, 2, "Soma");
        $this->assertEquals(5, $calc->getResultado(), "ERRO no método getResultado");

        $calc = new Calculadora(6, 3, "Subtrair");
        $this->assertEquals(3, $calc->getResultado(), "ERRO no método getResultado");

        $calc = new Calculadora(10, 2, "Dividir");
        $this->assertEquals(5, $calc->getResultado(), "ERRO no método getResultado");

        $calc = new Calculadora(50, 0, "Dividir");
        $this->assertEquals("Não é um número!", $calc->getResultado(), "ERRO no método getResultado");
    }

}