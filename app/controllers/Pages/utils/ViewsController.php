<?php

namespace App\Controllers\Pages\Utils;

class ViewsController {

    public static function render($view, $data = []) {
        // Extrai variáveis do array $data (ex: $nome, $contatos, etc)
        extract($data);

        // Caminho absoluto até a pasta das views
        $caminho = realpath(__DIR__ . '/../../../../resources/views/pages/' . $view . '.php');

        // Verifica se o arquivo existe
        if (!file_exists($caminho)) {
            echo "View não encontrada: " . $caminho;
            exit;
        }

        // Inclui a view
        include $caminho;
    }
}
