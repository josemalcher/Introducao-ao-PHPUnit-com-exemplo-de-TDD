<?php

use PHPUnit\Framework\TestCase;

class MeuPrimeiroTest extends TestCase{
    public function testPrimeiroTestes(){
        $teste = 1 == 1;
        $this->assertTrue($teste);
    }
}