<?php
require_once './app/Model/apiMesaModel.php';
require_once './app/View/apiView.php';

class apiMesaController {
    private $model;
    private $view;
    private $data;
    
    public function __construct() {

        $this->model = new MesaApiModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }
    
    private function getData() {
        
        return json_decode($this->data);
    }

    public function getMesas() {

        $columnas = ['juego', 'director', 'cantidadJugadores'];
        
        if(!isset($_GET['sort']) ){
            $sort = 'id_mesadejuego';
        }
        if(isset($_GET['sort']) ){
            
            if(in_array($_GET['sort'], $columnas)){
                $sort = $_GET['sort'];
            } else {
                $this->view->response("El dato insertado en el elemento sort es invalido", 400);
                die();
            }
        }

        if(!isset($_GET['order']) ){
            $order = 'ASC';
        }
        else/*(isset($_GET['order']) )*/{
            if ( (strtoupper($_GET['order'] == 'ASC')) || (strtoupper($_GET['order'] == 'DESC') )){
                $order = ($_GET['order']);
                $order = strtoupper($order);
            } else {
                $this->view->response("El dato insertado en el elemento order es invalido", 400);
                die();
            }
        }

        if(!isset($_GET['limit']) ){
            $limit = 10000000;
        }
        if(isset($_GET['limit']) ){
            
            if( ( ($_GET['limit']) >= 1 ) && ( is_numeric($_GET['limit']) ) ) {
                $limit = ( $_GET['limit'] );
            } else {
                $this->view->response("El dato insertado en el elemento limit es invalido", 400);
                die();
            }
        }
        
        $mesadejuego = $this->model->getALLMesas($sort, $order, $limit);
        $this->view->response($mesadejuego);
    }
    
    public function getMesa($params = null){

        $id_mesadejuego = $params[':ID'];
        $mesadejuego = $this->model->getMesaDeJuego($id_mesadejuego);
        
        if ($mesadejuego){
            $this->view->response($mesadejuego);
        }
        else {
            $this->view->response("Hay un problema, la tarea con el id= $id_mesadejuego no existe. No puedo darte la mesa que me pedis", 404);
        }
    }
    
    public function addMesa($params = null) {

        $mesadejuego = $this->getData();

        if (empty($mesadejuego->juego) || empty($mesadejuego->director) || empty($mesadejuego->cantidadJugadores)) {
            $this->view->response("Hacen falta datos, por favor, dame datos", 400);
        }else {
            $id = $this->model->insertMesa($mesadejuego->juego, $mesadejuego->director, $mesadejuego->cantidadJugadores);
            $mesadejuego = $this->model->getMesaDeJuego($id);
            $this->view->response($mesadejuego, 201);
        }
    }

    function deleteMesa($params = null) {
        $id_mesadejuego = $params[':ID'];

        $mesadejuego = $this->model->getMesaDeJuego($id_mesadejuego);
        if ($mesadejuego) {
            $this->model->deleteMesa($id_mesadejuego);
            $this->view->response($mesadejuego);
        } else {
            $this->view->response("Hay un problema, la tarea con el id=$id_mesadejuego no existe. No puedo borrar la mesa que me pedis", 404);
        }
        
    }
    
}