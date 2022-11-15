<?php 

class MesaApiModel {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_sesion;charset=utf8', 'root', '');
    }

    public function getALLMesas($sort, $order, $limit) { 

        
        $conjunto = ("SELECT * FROM `mesadejuego` ORDER BY $sort $order LIMIT $limit ");
        // $conjunto = ('SELECT * FROM `mesadejuego` ORDER BY $sort $order'); Si en lugar de "" usas '' no lo toma.

        $query = $this->db->prepare($conjunto);
        $query->execute();
        $mesadejuego = $query->fetchAll(PDO::FETCH_OBJ); 
        return $mesadejuego;
    }

    // public function getALLMesas() {
    //     // 1. la conexión a la DB ya esta abierta por el constructor de la clase
        
    //     // 2. ejecuto la sentencia (2 subpasos)
    //     $query = $this->db->prepare('SELECT * FROM `mesadejuego`');
    //     $query->execute();
    //     // 3. obtengo los resultados
    //     $mesadejuego = $query->fetchAll(PDO::FETCH_OBJ); // devuelve un arreglo de objetos

    //     return $mesadejuego;
    // }

    public function getMesaDeJuego($id_mesadejuego) {

        $query = $this->db->prepare('SELECT * FROM `mesadejuego` WHERE `id_mesadejuego` = ?');
        $query->execute([$id_mesadejuego]);
        $mesadejuego = $query->fetch(PDO::FETCH_OBJ); 

        return $mesadejuego;
    }

    public function insertMesa($juego, $director, $cantidadJugadores) {

        $mesadejuego = $this->db->prepare('INSERT INTO mesadejuego (juego, director, cantidadJugadores) VALUES (?, ?, ?)');

        $mesadejuego->execute([$juego, $director, $cantidadJugadores]);

        return $this->db->lastInsertId();
    }

    function deleteMesa($id_mesadejuego) {

        $mesadejuego = $this->db->prepare('DELETE FROM `mesadejuego` WHERE `id_mesadejuego` = ?');
        $mesadejuego->execute([$id_mesadejuego]);
    }
}