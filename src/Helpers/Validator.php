<?php

namespace Src\Helpers;

class Validator
{
    public static function nome(string $nome): bool
    {
        return trim($nome) !== "";
    }

    public static function email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function telefone(string $numero): bool
    {
        $apenas = preg_replace('/\D/', '', $numero);
        $len = strlen($apenas);

        return $len >= 9 && $len <= 11;
    }
}
