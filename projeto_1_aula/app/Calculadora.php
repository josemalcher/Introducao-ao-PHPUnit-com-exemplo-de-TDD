<?php

namespace App;

class Calculadora
{
    private $valorA;
    private $valorB;
    private $operador;
    private $resultado;

    /**
     * Calculadora constructor.
     */
    public function __construct($valorA, $valorB, $operador)
    {
        $this->valorA = $valorA;
        $this->valorB = $valorB;
        $this->operador = $operador;
    }


    public function getValorA()
    {
        return $this->valorA;
    }

    public function getValorB()
    {
        return $this->valorB;

    }

    public function getOperador()
    {
        return $this->operador;
    }

    public function getResultado()
    {

    }
}