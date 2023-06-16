<?php

namespace ProductNameSpace;

class Product{
 
    // database connection and table name
    public $conn;
    public $table_name = "products";
 
    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created; # date created
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



    
}