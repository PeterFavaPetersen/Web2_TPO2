<?php

require_once 'libs/Router.php';
require_once 'app/Controller/apiCampeonController.php';
require_once 'app/Controller/apiMesaController.php'; 

// crea el router
$router = new Router(); 
/**/

// define la tabla de ruteo
//$router->addRoute('tabla', 'httpMethod', 'constructorController', 'funcionController'); 
//$router->addRoute('', '', '', ''); 
$router->addRoute('mesadejuego', 'GET', 'apiMesaController', 'getMesas'); 
$router->addRoute('mesadejuego/:ID', 'GET', 'apiMesaController', 'getMesa'); 
$router->addRoute('mesadejuego', 'POST', 'apiMesaController', 'addMesa'); 
$router->addRoute('mesadejuego/:ID', 'DELETE', 'apiMesaController', 'deleteMesa'); 

$router->addRoute('campeones', 'GET', 'apiCampeonController', 'getCapeones'); 
$router->addRoute('campeones/:ID', 'GET', 'apiCampeonController', 'getCampeon'); 
$router->addRoute('campeones', 'POST', 'apiCampeonController', 'addCampeon'); 
$router->addRoute('campeones/:ID', 'DELETE', 'apiCampeonController', 'deleteCampeon'); 


// rutea
$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);