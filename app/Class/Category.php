<?php
class Category{
    // database connection and table name
    private $conn;
    private $table_name = "categories";

    public function __construct($db){
    	$this->conn = $db;
    }


	// read Categories
	function read(){
	 
	    // select all query
	    $query = "SELECT
	                c.name , c.id, c.description
	            FROM
	                " . $this->table_name . " c ORDER BY c.name";
	 
	    // prepare query statement
	    $stmt = $this->conn->prepare($query);
	 
	    // execute query
	    $stmt->execute();
	 
	    return $stmt;
	}

}
