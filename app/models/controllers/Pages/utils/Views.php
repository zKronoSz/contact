<?php 
    
    /**gerencisar conteudo dinamico das views */

    namespace App\Models\Controllers\Pages\Utils;

    class Views{

            /** Metodo responsavel por retornar o conteudo da view */

            private static function getContentView($view){
                $file = __DIR__ . '/../../../../../resources/views/'. $view . '.html';
                return file_exists($file) ? file_get_contents($file) : '';
            }

            public static function render($view,$vars = []){
                $contentView = self::getContentView($view);

                echo"<pre>";
                print_r($view);
                echo "</pre>";exit;

                return $contentView;
            }

    }





?>