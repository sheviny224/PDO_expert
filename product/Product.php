<?php
require_once "../includes/Database.php";

class Product
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function insertProduct($productNaam, $omschrijving, $prijsPerStuk, $fotoPad)
    {
        $sql = "INSERT INTO products (productNaam, omschrijving, prijsPerStuk, foto) 
                VALUES (:productNaam, :omschrijving, :prijsPerStuk, :foto)";
        $params = [
            ':productNaam' => $productNaam,
            ':omschrijving' => $omschrijving,
            ':prijsPerStuk' => $prijsPerStuk,
            ':foto' => $fotoPad
        ];

        return $this->db->run($sql, $params);
    }

    public function getAllProducts() {
        $sql = "SELECT * FROM products";
        return $this->db->run($sql);
    }
  
}