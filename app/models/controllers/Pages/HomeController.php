<?php 

    namespace App\Models\Controllers\Pages;

    use App\Models\Controllers\Pages\Utils\Views;

    class HomeController{

        public static function getHome(){
            return Views::render('pages/home');
        }

    }










?>