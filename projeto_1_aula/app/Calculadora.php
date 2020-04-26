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
        if ($this->getOperador() == "Soma") {
            return $this->getValorA() + $this->getValorB();
        } elseif ($this->getOperador() == "Subtrair") {
            return $this->getValorA() - $this->getValorB();
        } elseif ($this->getOperador() == "Dividir") {
            if ($this->getValorB() == 0) {
                return "Não é um número!";
            }
            return $this->getValorA() / $this->getValorB();
        } elseif ($this->getOperador() == "Multiplicar") {
            return $this->getValorA() * $this->getValorB();
        } elseif ($this->getOperador() == "Modulo") {
            return $this->getValorA() - $this->getValorB();
        } else {
            return "Não há operando";
        }


    }
}