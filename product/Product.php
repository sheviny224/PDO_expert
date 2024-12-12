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
    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE product_id = :id";
        $params = [':id' => $id];
        return $this->db->run($sql, $params)->fetch();
    }

    public function updateProducts($product_id,$productNaam, $omschrijving, $prijsPerStuk ) {
        $sql = "UPDATE products SET 
        productNaam =  :productNaam,
        omschrijving = :omschrijving,
        prijsPerStuk = :prijsPerStuk";

        $params = [
            ':productNaam' => $productNaam,
            ':omschrijving' => $omschrijving,
            ':prijsPerStuk' => $prijsPerStuk,
            ':product_id' => $product_id
        ];
        return $this->db->run($sql, $params);
    }

    
}