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









































}