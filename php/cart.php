<?php

class Cart {

    private $conn;

    public function __construct($conn) {
        $this->conn=$conn;
    }

    public function getCartContent($kosar_id) {
        return mysqli_query(
            $this->conn,
            "SELECT o.neve, o.kep, SUM(o.ar) ar, o.tipus, SUM(kt.mennyiseg) mennyiseg
            FROM osszes_termek o 
            JOIN kosar_termekek kt 
            ON (kt.tipus=o.tipus AND kt.termek_id=o.id) 
            WHERE kt.kosar_id=$kosar_id
            GROUP BY o.neve;"
        );
    }

    public function emptyCart($kosar_id){
        $query = "DELETE FROM kosar_termekek WHERE kosar_id = $kosar_id";
        $this->conn->query($query);
    }
}