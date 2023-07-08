<?php

namespace App\Category;

class Category{
    // database connection and table name
    private $conn;
	private $name;
    private $table_name = "categories";

    public function __construct($db){
    	$this->conn = $db;
    }

	public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
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
