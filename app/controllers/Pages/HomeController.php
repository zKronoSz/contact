<?php 

    namespace App\Controllers\Pages;

    use App\Controllers\Pages\Utils\ViewsController;
    

    class HomeController{

        public static function getHome(){
            return ViewsController::render('home');
        }

    }










?>