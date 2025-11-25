<?php
use PHPUnit\Framework\TestCase;

class TesteBasicoTest extends TestCase
{
    public function testVerificacaoBasica()
    {
        $this->assertTrue(true);
        echo "Teste básico executado com sucesso!\n";
    }

    public function testSomaSimples()
    {
        $resultado = 2 + 2;
        $this->assertEquals(4, $resultado);
    }
}
?>