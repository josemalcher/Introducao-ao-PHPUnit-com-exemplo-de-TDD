# Introdução ao PHPUnit com exemplo de TDD

https://www.udemy.com/course/introducao-ao-phpunit-com-exemplo-de-tdd/

Primeiros passos no desenvolvimento com testes usando PHPUnit

## <a name="indice">Índice</a>

1. [Introdução ao curso](#parte1)     
2. [Requisitos para o Curso](#parte2)     
3. [O que é PHPUnit e TDD](#parte3)     
4. [Instalando o PHPUnit](#parte4)     
5. [Criando o primeiro Teste](#parte5)     
6. [Teste de Atributos em uma Classe](#parte6)     
7. [Teste de Atributos em uma Classe](#parte7)     
8. [Trabalhando com Anotação @depends](#parte8)     
9. [Testes no Método Construtor](#parte9)     
10. [Implementando com TDD](#parte10)     
11. [Teste da Classe Implementada](#parte11)     
12. [Refatorando uma Classe](#parte12)     
13. [Iniciando com Testes em Banco de Dados](#parte13)     
14. [Configurando o teste com Banco de Dados](#parte14)     
15. [Teste com Registros do Banco de Dados](#parte15)     
16. [Considerações finais](#parte16)     
---


## <a name="parte1">1 - Introdução ao curso</a>



[Voltar ao Índice](#indice)
 
---


## <a name="parte2">2 - Requisitos para o Curso</a>

- PHP 
- COMPOSER

[Voltar ao Índice](#indice)

---


## <a name="parte3">3 - O que é PHPUnit e TDD</a>

- https://phpunit.readthedocs.io/pt_BR/latest/

[Voltar ao Índice](#indice)

---


## <a name="parte4">4 - Instalando o PHPUnit</a>

```
composer init

```

```json
{
    "name": "josem/projeto_1_aula",
    "type": "project",
    "license": "MIT",
    "authors": [
        {
            "name": "josemalcher",
            "email": "contato@josemalcher.net"
        }
    ],
    "require": {},
    "autoload": {
        "psr-4": {
            "App\\": "app/"
        }
    }
}

```

```
composer update
```

- Instalar o PHPUnit

```
composer require --dev phpunit/phpunit ^7
```




[Voltar ao Índice](#indice)

---


## <a name="parte5">5 - Criando o primeiro Teste</a>

- projeto_1_aula/phpunit.xml

```xml
<?xml version="1.0" encoding="UTF-8" ?>
<phpunit bootstrap="vendor/autoload.php">
    <testsuites>
        <testsuite name="testes">
            <directory>tests</directory>
        </testsuite>
    </testsuites>
</phpunit>
```

- projeto_1_aula/tests/MeuPrimeiroTest.php

```php
<?php

use PHPUnit\Framework\TestCase;

class MeuPrimeiroTest extends TestCase{
    public function testPrimeiroTestes(){
        $teste = 1 == 1;
        $this->assertTrue($teste);
    }
}
```

```

#########__   Rodando com a versão atual do phpunit           __########################

php vendor/phpunit/phpunit/phpunit

```

[Voltar ao Índice](#indice)

---


## <a name="parte6">6 - Teste de Atributos em uma Classe</a>

- projeto_1_aula/app/Calculadora.php

```php
<?php
namespace App;

class Calculadora
{
    private $valorA;
    private $valorB;
    private $operador;
    private $resultado;
}
```

- projeto_1_aula/tests/CalculadoraTest.php

```php
<?php
use PHPUnit\Framework\TestCase;
use App\Calculadora;

class CalculadoraTest extends TestCase{
    public function testeAtributosCalculadora()
    {
        $this->assertClassHasAttribute('valorA' ,   Calculadora::class);
        $this->assertClassHasAttribute('valorB', Calculadora::class);
        $this->assertClassHasAttribute('operador', Calculadora::class);
        $this->assertClassHasAttribute('resultado', Calculadora::class);
    }
}
```

[Voltar ao Índice](#indice)

---


## <a name="parte7">7 - Teste de Atributos em uma Classe</a>

```php
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
```

[Voltar ao Índice](#indice)

---


## <a name="parte8">8 - Trabalhando com Anotação @depends</a>

- https://phpunit.readthedocs.io/pt_BR/latest/annotations.html

```

    /**
     * @depends testeAtributosCalculadora
     *
     *   
     */

```


[Voltar ao Índice](#indice)

---


## <a name="parte9">9 - Testes no Método Construtor</a>

```php
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
        $this->assertFalse(isset($calc->valorA), "ATRIBUTO DEVE SER PRIVADO");
        $this->assertFalse(isset($calc->valorB), "ATRIBUTO DEVE SER PRIVADO");
        $this->assertFalse(isset($calc->operador), "ATRIBUTO DEVE SER PRIVADO");

    }

}
```

[Voltar ao Índice](#indice)

---


## <a name="parte10">10 - Implementando com TDD</a>

[projeto_1_aula/tests/CalculadoraTest.php](projeto_1_aula/tests/CalculadoraTest.php)

```php

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
```



[Voltar ao Índice](#indice)

---


## <a name="parte11">11 - Teste da Classe Implementada</a>

```php
<?php

require_once '../vendor/autoload.php';

use App\Calculadora;

$calc = new Calculadora(20, 30, "Soma");
echo $calc->getResultado();


```

[Voltar ao Índice](#indice)

---


## <a name="parte12">12 - Refatorando uma Classe</a>

```php

    /**
     * @depends testConstrutorCalculadora
     * */
    public function testStaticCalculadora()
    {
        $resultado = Calculadora::calcular(2, 4, "Soma");
        $this->assertEquals(6, $resultado, "Erro no método calcular - ESTÁTICO");

    }


```

[Voltar ao Índice](#indice)

---


## <a name="parte13">13 - Iniciando com Testes em Banco de Dados</a>

[https://phpunit.readthedocs.io/pt_BR/latest/installation.html?highlight=DbUnit#pacotes-opcionais](https://phpunit.readthedocs.io/pt_BR/latest/installation.html?highlight=DbUnit#pacotes-opcionais)

```
composer require --dev phpunit/dbunit
```

- [projeto_1_aula/tests/produtos.xml](projeto_1_aula/tests/produtos.xml)

```xml
<dataset>
    <table name="produtos">
        <column>id</column>
        <column>titulo</column>
        <column>descricao</column>
        <column>valor</column>
        <row>
            <value>1</value>
            <value>Curso de PHPUnir</value>
            <value>Aprenda a fazer testes no PHP</value>
            <value>55.5</value>
        </row>
        <row>
            <value>2</value>
            <value>Curso de JS</value>
            <value>Aprenda a JS com tal tal tal </value>
            <value>90.5</value>
        </row>
    </table>
    <table name="clientes">

    </table>
</dataset>
```

- [projeto_1_aula/tests/ProdutosTest.php](projeto_1_aula/tests/ProdutosTest.php)

```php
<?php

use PHPUnit\Framework\TestCase;

class ProdutosTest extends TestCase
{
    public function testeListaProdutos()
    {
        
    }
}
```

[Voltar ao Índice](#indice)

---


## <a name="parte14">14 - Configurando o teste com Banco de Dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte15">15 - Teste com Registros do Banco de Dados</a>



[Voltar ao Índice](#indice)

---


## <a name="parte16">16 - Considerações finais</a>



[Voltar ao Índice](#indice)

---

