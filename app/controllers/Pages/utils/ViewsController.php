<?php

/**gerencisar conteudo dinamico das views */

namespace App\Controllers\Pages\Utils;

class ViewsController
{

    /** Metodo responsavel por retornar o conteudo da view */


    private static function getContentView($view)
    {
        $file = __DIR__ . '/../../../../resources/views/' . $view . '.php';
        return file_exists($file) ? file_get_contents($file) : '';
    }

    public static function render($view, $vars = [])
    {
        $contentView = self::getContentView($view);
        if (empty($contentView)) {
            die("View não encontrada: " . __DIR__ . '/../../../../../resources/views/' . $view . '.php');
        }else{
        return $contentView;
         }
    }
}
