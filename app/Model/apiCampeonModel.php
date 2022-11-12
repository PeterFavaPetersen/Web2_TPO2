<?php 

class CampeonApiModel{
    // Abro conexión a la DB
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_sesion;charset=utf8', 'root', '');
    }

    public function getALLCampeones() {
        // 1. la conexión a la DB ya esta abierta por el constructor de la clase
        
        // 2. ejecuto la sentencia (2 subpasos)
        $query = $this->db->prepare('SELECT * FROM `campeones`');
        $query->execute();
        // 3. obtengo los resultados
        $campeon = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

        return $campeon;
    }

    public function getCampeonId($id_campeones) {

        $query = $this->db->prepare('SELECT * FROM `campeones` WHERE `id_campeones` = ?');
        $query->execute([$id_campeones]);

        $campeon = $query->fetch(PDO::FETCH_OBJ); 

        return $campeon;
    }

    public function insertCampeon($nombre, $duracion, $fecha, $id_juego) {

        $campeones = $this->db->prepare('INSERT INTO campeones (nombre, duracion, fecha, id_juego) VALUES (?, ?, ?, ?)');

        $campeones->execute([$nombre, $duracion, $fecha, $id_juego]);

        return $this->db->lastInsertId();
    }
    
    function deleteCampeon($id_campeon) {

        $campeones = $this->db->prepare('DELETE FROM `campeones` WHERE `id_campeones` = ?');
        $campeones->execute([$id_campeon]);
    }





































}