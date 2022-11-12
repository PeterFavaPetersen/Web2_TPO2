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
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }
    
    private function getData() {
        
        return json_decode($this->data);
    }
    
    public function getMesas($params = null) {
        
        $mesadejuego = $this->model->getALLMesas();
        $this->view->response($mesadejuego);
    }
    
    public function getMesa($params = null){

        // obtengo el id del arreglo de params
        $id_mesadejuego = $params[':ID'];
        $mesadejuego = $this->model->getMesaDeJuego($id_mesadejuego);

        // si no existe devuelvo 404
        if ($mesadejuego){
            $this->view->response($mesadejuego);
        }
        else {
            $this->view->response("Hay un problema, la tarea con el id=$id_mesadejuego no existe", 404);
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
            $this->view->response("Hay un problema, la tarea con el id=$id_mesadejuego no existe", 404);
        }
        
    }
    
}