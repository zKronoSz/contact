<?php
use PHPUnit\Framework\TestCase;

class TesteExplicativoTest extends TestCase
{
    /**
     * EXEMPLO 1: Teste de Validação de Número de Telefone
     * Técnica: Análise de Valor Limite
     */
    public function testNumeroTelefoneExatamente9Digitos()
    {
        echo "\nTESTE 1: Número com 9 dígitos\n";
        echo "----------------------------------------\n";
        
        // CENARIO VALIDO: Número com exatamente 9 dígitos
        $numeroValido = '123456789';
        $quantidadeDigitos = strlen($numeroValido);
        
        echo "Numero testado: '{$numeroValido}'\n";
        echo "Quantidade de dígitos: {$quantidadeDigitos}\n";
        echo "Esperado: 9 dígitos\n";
        
        // ASSERT: Verifica se tem exatamente 9 dígitos
        $this->assertEquals(9, $quantidadeDigitos, 
            "ERRO: O número deve ter EXATAMENTE 9 dígitos!");
        
        echo "RESULTADO: Numero VALIDO - Passou no teste!\n";
    }

    /**
     * EXEMPLO 2: Teste de Validação de Email
     * Técnica: Particionamento de Equivalência
     */
    public function testEmailDeveConterArroba()
    {
        echo "\nTESTE 2: Validação de Email\n";
        echo "----------------------------------------\n";
        
        // CENARIO VALIDO: Email com @
        $emailValido = 'usuario@exemplo.com';
        
        echo "Email testado: '{$emailValido}'\n";
        echo "Verificando se contém '@'...\n";
        
        // ASSERT: Verifica se o email contém @
        $this->assertStringContainsString('@', $emailValido,
            "ERRO: Email deve conter '@'!");
        
        echo "RESULTADO: Email VALIDO - Passou no teste!\n";
    }

    /**
     * EXEMPLO 3: Teste de Senha com Mínimo de Caracteres
     * Técnica: Análise de Valor Limite
     */
    public function testSenhaComMinimo6Caracteres()
    {
        echo "\nTESTE 3: Validação de Senha\n";
        echo "----------------------------------------\n";
        
        // CENARIO VALIDO: Senha com 6 caracteres (mínimo)
        $senhaValida = '123456';
        $tamanhoSenha = strlen($senhaValida);
        
        echo "Senha testada: '{$senhaValida}'\n";
        echo "Tamanho da senha: {$tamanhoSenha} caracteres\n";
        echo "Esperado: Pelo menos 6 caracteres\n";
        
        // ASSERT: Verifica se tem pelo menos 6 caracteres
        $this->assertGreaterThanOrEqual(6, $tamanhoSenha,
            "ERRO: Senha deve ter pelo menos 6 caracteres!");
        
        echo "RESULTADO: Senha VALIDA - Passou no teste!\n";
    }

    /**
     * EXEMPLO 4: Teste de Estrutura de Dados
     * Técnica: Teste de Caminho Básico
     */
    public function testEstruturaCompletaDoUsuario()
    {
        echo "\nTESTE 4: Estrutura de Dados do Usuario\n";
        echo "----------------------------------------\n";
        
        // Simulando dados de um usuário
        $usuario = [
            'id' => 1,
            'nome' => 'Maria Silva',
            'email' => 'maria@email.com',
            'senha' => '123456'
        ];
        
        echo "Dados do usuario simulados:\n";
        print_r($usuario);
        echo "\nVerificando estrutura...\n";
        
        // ASSERTS: Verifica cada campo obrigatório
        $this->assertArrayHasKey('id', $usuario, "Campo 'id' é obrigatório!");
        $this->assertArrayHasKey('nome', $usuario, "Campo 'nome' é obrigatório!");
        $this->assertArrayHasKey('email', $usuario, "Campo 'email' é obrigatório!");
        $this->assertArrayHasKey('senha', $usuario, "Campo 'senha' é obrigatório!");
        
        echo "RESULTADO: Estrutura CORRETA - Todos os campos presentes!\n";
    }

    /**
     * EXEMPLO 5: Teste de Comparação de Valores
     */
    public function testComparacaoDeValores()
    {
        echo "\nTESTE 5: Comparacao de Valores\n";
        echo "----------------------------------------\n";
        
        $valorEsperado = 100;
        $valorReal = 50 + 50;
        
        echo "Valor esperado: {$valorEsperado}\n";
        echo "Valor real: {$valorReal}\n";
        echo "Verificando se sao iguais...\n";
        
        $this->assertEquals($valorEsperado, $valorReal,
            "ERRO: Os valores nao sao iguais!");
        
        echo "RESULTADO: Valores conferem - Passou no teste!\n";
    }
}
?>