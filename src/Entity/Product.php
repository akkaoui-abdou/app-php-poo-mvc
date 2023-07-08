<?php

namespace App\Product;

class Product{
 
    // database connection and table name
    private $conn;
    private $table_name = "products";
 
    // object properties
    private $id;
    private $name;
    private $description;
    private $price;
    private $category;
    private $created; # date created
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getPrice(){
        return $this->price;
    }

    public function setPrice($price){
        $this->price = $price;
    }

    public function getCategory() {
        return $this->category;
    }
    
    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCreated() {
        return $this->created;
    }
    
    public function setCreated($created) {
        $this->created = $created;
    }

    public function getConn() {
        return $this->conn;
    }
    
    public function setConn($conn) {
        $this->conn = $conn;
    }

    public function getTableName(){
        return $this->table_name;
    }

    public function setTableName($table_name){
        $this->table_name = $table_name;
    }
}