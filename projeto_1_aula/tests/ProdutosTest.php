<?php

use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class ProdutosTest extends TestCase
{
    use TestCaseTrait;

    protected function getConnection()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=phpunit_proj01", "root", "");
        return $this->createDefaultDBConnection($pdo, "phpunit_proj01");
    }

    protected function getDataSet()
    {
      return $this->createXMLDataSet('tests/produtos.xml');
    }


    public function testeListaProdutos()
    {
        $conn = $this->getConnection()->getConnection();
        $query = $conn->query("SELECT * FROM produtos");
        $lista = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->assertCount(2, $lista, "Quantidade de Produtos Cadastrados");

        $this->assertEquals("Curso de JS", $lista[1]['titulo'], "Teste de Título");

    }

}