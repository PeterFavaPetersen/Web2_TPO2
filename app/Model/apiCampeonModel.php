<?php 

class CampeonApiModel{
    // Abro conexión a la DB
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_sesion;charset=utf8', 'root', '');
    }

    public function getALLCampeones($sort, $order, $limit) {

        $query = $this->db->prepare("SELECT * FROM `campeones` ORDER BY $sort $order LIMIT $limit ");
        $query->execute();
        
        $campeon = $query->fetchAll(PDO::FETCH_OBJ); 

        return $campeon;
    }

    public function getCampeonId($id_campeones) {

        $query = $this->db->prepare('SELECT * FROM `campeones` WHERE `id_campeones` = ?');
        $query->execute([$id_campeones]);

        $campeon = $query->fetch(PDO::FETCH_OBJ); 

        return $campeon;
    }

    public function insertCampeon($nombre, $id_juego, $duracion, $fecha) {

        $campeones = $this->db->prepare('INSERT INTO campeones (nombre, id_juego, duracion, fecha) VALUES (?, ?, ?, ?)');

        $campeones->execute([$nombre, $id_juego, $duracion, $fecha]);

        return $this->db->lastInsertId();
    }
    
    function deleteCampeon($id_campeon) {

        $campeones = $this->db->prepare('DELETE FROM `campeones` WHERE `id_campeones` = ?');
        $campeones->execute([$id_campeon]);
    }





































}