<?php
require_once './app/Model/apiMesaModel.php';
require_once './app/View/apiMesaView.php';

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
        $id = $params[':ID'];
        $mesadejuego = $this->model->get($id);

        // si no existe devuelvo 404
        if ($mesadejuego)
        $this->view->response($mesadejuego);
        else 
        $this->view->response("La tarea con el id=$id no existe", 404);
    }
    
    public function addMesa($params = null) {

        $mesadejuego = $this->getData();
        //COMPLETAR
    }

    function deleteMesa($params = null) {
        $id = $params[':ID'];

        $this->model->deleteMesa($id);
        header("Location: " . BASE_URL);
    }
    
}