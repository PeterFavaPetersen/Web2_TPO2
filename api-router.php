<?php

require_once 'libs/Router.php';
require_once 'app/Controller/apiCampeonController.php';
require_once 'app/Controller/apiMesaController.php'; 

// crea el router
$router = new Router(); 
/**/

// define la tabla de ruteo
//$router->addRoute('tabla', 'httpMethod', 'controller', 'funcionController'); 
//$router->addRoute('', '', '', ''); 
$router->addRoute('mesadejuego', 'GET', '', ''); 
$router->addRoute('mesadejuego/:ID', 'GET', '', ''); 
$router->addRoute('mesadejuego/:ID', 'DELETE', '', ''); 
$router->addRoute('mesadejuego', 'POST', '', ''); 
$router->addRoute('campeones', 'GET', '', ''); 
$router->addRoute('campeones/:ID', 'GET', '', ''); 
$router->addRoute('campeones/:ID', 'DELETE', '', ''); 
$router->addRoute('campeones', 'POST', '', ''); 


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);