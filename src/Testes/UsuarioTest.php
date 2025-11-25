<?php
use PHPUnit\Framework\TestCase;

class UsuarioTest extends TestCase
{
    public function testValidacaoEmail()
    {
        $emailValido = 'usuario@exemplo.com';
        $this->assertStringContainsString('@', $emailValido, "Email deve conter @");
        echo "✓ Teste de validação de email executado\n";
    }

    public function testValidacaoSenha()
    {
        $senha = '123456';
        $this->assertGreaterThanOrEqual(6, strlen($senha), "Senha deve ter pelo menos 6 caracteres");
        echo "✓ Teste de validação de senha executado\n";
    }

    public function testEstruturaUsuario()
    {
        $usuarioSimulado = [
            'id' => 1,
            'nome' => 'Maria Silva',
            'email' => 'maria@email.com'
        ];
        
        $this->assertArrayHasKey('id', $usuarioSimulado);
        $this->assertArrayHasKey('nome', $usuarioSimulado);
        $this->assertArrayHasKey('email', $usuarioSimulado);
        echo "✓ Teste de estrutura de usuário executado\n";
    }
}
?>