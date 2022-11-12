<?php
require_once './app/Model/apiCampeonModel.php';
require_once './app/Model/apiMesaController.php';
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
        $campeones = $this->model->getALLCampeones();
        $mesadejuego = $this->model->getALLMesas();
        $this->view->showCapeon($campeones, $mesadejuego);
    }

    function addCampeon($params = null) {

        $campeon = $this->getData();

        if (empty($campeon->nombre) || empty($campeon->id_juego) || empty($campeon->duracion) || empty($campeon->fecha)) {
            $this->view->response("Hacen falta datos, por favor, dame datos", 400);
        }else {
            $id_campeon = $this->model->insertCampeon($campeon->nombre, $campeon->id_juego, $campeon->duracion, $campeon->fecha);
            $campeon = $this->model->getCampeon($id_campeon);
            $this->view->response($campeon, 201);
        }
    }

    function deleteCampeon($params = null) {
        $campeon = $params[':ID'];

        $campeon = $this->model->getCampeon($id_campeon);
        if ($campeon) {
            $this->model->deleteMesa($id_campeon);
            $this->view->response($campeon);
        } else {
            $this->view->response("Hay un problema, la tarea con el id=$id_campeon no existe", 404);
        }
    }

}