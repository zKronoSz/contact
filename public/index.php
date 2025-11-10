<?php 
        require_once __DIR__ . '/../vendor/autoload.php';
        use App\Controllers\Pages\HomeController;


       echo  HomeController::getHome();
?>

        