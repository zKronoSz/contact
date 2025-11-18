<?php
//Red
namespace Src\Tests;

use PHPUnit\Framework\TestCase;
use Src\Helpers\Validator;

class ValidatorTest extends TestCase
{
    public function testRejeitaNomeVazio()
    {
        $this->assertFalse(Validator::nome(""));
        $this->assertFalse(Validator::nome("   "));
    }

    public function testRejeitaEmailInvalido()
    {
        $this->assertFalse(Validator::email("email@@gmail"));
        $this->assertFalse(Validator::email("sem-arroba.com"));
    }

    public function testAceitaTelefoneValido()
    {
        $this->assertTrue(Validator::telefone("999999999"));
        $this->assertTrue(Validator::telefone("99999999999"));
        $this->assertFalse(Validator::telefone("123"));
        $this->assertFalse(Validator::telefone("1234567891234"));
    }
}
