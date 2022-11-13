<?php
require_once './app/Model/apiCampeonModel.php';
require_once './app/View/apiView.php';

class apiCampeonController {
    private $model;
    private $view;
    private $data;
    
    public function __construct() {

        $this->model = new CampeonApiModel();
        $this->view = new ApiView();
        // lee el body del request
        $this->data = file_get_contents("php://input");
    }

    private function getData() {

        return json_decode($this->data);
    }

    public function getCapeones($params = null) {
        
        //Traigo la el contenido de cada Campeon.

        //$mesadejuego = $this->model->getALLMesas();
        //$this->view->response($campeones, $mesadejuego);

        $campeones = $this->model->getALLCampeones();
        $this->view->response($campeones);
    }
    
    public function getCampeon($params = null){

        // obtengo el id del arreglo de params
        $id_campeon = $params[':ID'];
        $campeon = $this->model->getCampeonId($id_campeon);

        // si no existe devuelvo 404
        if ($campeon){
            $this->view->response($campeon);
        }
        else {
            $this->view->response("Hay un problema, la tarea con el id= $id_campeon no existe. No puedo darte el campeon que me pedis.", 404);
        }
    }

    function addCampeon($params = null) {

        $campeon = $this->getData();

        if (empty($campeon->nombre) || empty($campeon->id_juego) || empty($campeon->duracion) || empty($campeon->fecha)) {
            $this->view->response("Hacen falta datos, por favor, dame datos. Requiero todos los datos para agregar al campeon que quieres registrar. ESTO ES UN ERROR 400", 400);
        }else {
            $id_campeon = $this->model->insertCampeon($campeon->nombre, $campeon->id_juego, $campeon->duracion, $campeon->fecha);
            $campeon = $this->model->getCampeonId($id_campeon);
            $this->view->response($campeon, 201);
        }
    }

    function deleteCampeon($params = null) {
        $id_campeon = $params[':ID'];

        $campeon = $this->model->getCampeonId($id_campeon);
        if ($campeon) {
            $this->model->deleteCampeon($id_campeon);
            $this->view->response($campeon);
        } else {
            $this->view->response("Hay un problema, la tarea con el id = $id_campeon no existe. No puedo borrar un campeon que no existe. ESTO ES UN ERROR 404", 404);
        }
    }

}