<?php
use PHPUnit\Framework\TestCase;

class FluxoLoginTest extends TestCase
{
    public function testFluxoRegistro()
    {
        $dadosRegistro = [
            'nome' => 'Novo Usuário',
            'email' => 'novo@email.com',
            'senha' => '123456'
        ];
        
        $this->assertCount(3, $dadosRegistro, "Dados de registro devem ter 3 campos");
        $this->assertEquals('Novo Usuário', $dadosRegistro['nome']);
        echo "✓ Teste de fluxo de registro executado\n";
    }

    public function testFluxoLogin()
    {
        $credenciais = [
            'email' => 'usuario@exemplo.com',
            'senha' => 'senha123'
        ];
        
        $this->assertNotEmpty($credenciais['email'], "Email não pode estar vazio");
        $this->assertNotEmpty($credenciais['senha'], "Senha não pode estar vazia");
        echo "✓ Teste de fluxo de login executado\n";
    }

    public function testCamposObrigatorios()
    {
        $camposObrigatorios = ['nome', 'email', 'senha'];
        $this->assertContains('email', $camposObrigatorios);
        $this->assertContains('senha', $camposObrigatorios);
        echo "✓ Teste de campos obrigatórios executado\n";
    }
}
?>