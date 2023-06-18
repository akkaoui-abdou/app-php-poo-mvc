<?php

#use "../Class/Product";
namespace ProductControllerNameSpace; 

use ProductNameSpace\Product;

class ProductController{

    public  $product;

    // constructor with $db as database connection
    public function __construct(Product $product){
        $this->product = $product;
    }

// read products
function read(){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->product->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->product->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->product->table_name . "
            SET
                name=:name, price=:price, description=:description, category_id=:category_id, created=:created";
 
    // prepare query
    $stmt = $this->product->conn->prepare($query);
 
    // sanitize
    $this->product->name=htmlspecialchars(strip_tags($this->product->name));
    $this->product->price=htmlspecialchars(strip_tags($this->product->price));
    $this->product->description=htmlspecialchars(strip_tags($this->product->description));
    $this->product->category_id=htmlspecialchars(strip_tags($this->product->category_id));
    $this->product->created=htmlspecialchars(strip_tags($this->product->created));
 
    // bind values
    $stmt->bindParam(":name", $this->product->name);
    $stmt->bindParam(":price", $this->product->price);
    $stmt->bindParam(":description", $this->product->description);
    $stmt->bindParam(":category_id", $this->product->category_id);
    $stmt->bindParam(":created", $this->product->created);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}



// used when filling up the update product form
function readOne(){
 
    // query to read single record
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->product->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
 
    // prepare query statement
    $stmt = $this->product->conn->prepare( $query );
 
    // bind id of product to be updated
    $stmt->bindParam(1, $this->product->id);
 
    // execute query
    $stmt->execute();
 
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
    // set values to object properties
    $this->product->name = $row['name'];
    $this->product->price = $row['price'];
    $this->product->description = $row['description'];
    $this->product->category_id = $row['category_id'];
    $this->product->category_name = $row['category_name'];
}


// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->product->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";
 
    // prepare query statement
    $stmt = $this->product->conn->prepare($query);
 
    // sanitize
    $this->product->name=htmlspecialchars(strip_tags($this->product->name));
    $this->product->price=htmlspecialchars(strip_tags($this->product->price));
    $this->product->description=htmlspecialchars(strip_tags($this->product->description));
    $this->product->category_id=htmlspecialchars(strip_tags($this->product->category_id));
    $this->product->id=htmlspecialchars(strip_tags($this->product->id));
 
    // bind new values
    $stmt->bindParam(':name', $this->product->name);
    $stmt->bindParam(':price', $this->product->price);
    $stmt->bindParam(':description', $this->product->description);
    $stmt->bindParam(':category_id', $this->product->category_id);
    $stmt->bindParam(':id', $this->product->id);
 
    // execute the query
    if($stmt->execute()){
        return true;
    }
 
    return false;
}



// delete the product
function delete($id){
 
    // delete query
    $query = "DELETE FROM " . $this->product->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->product->conn->prepare($query);
 
    // sanitize
    $this->product->id=htmlspecialchars(strip_tags($this->product->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}


// search products
function search($keywords){
 
    // select all query
    $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->product->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
            ORDER BY
                p.created DESC";
 
    // prepare query statement
    $stmt = $this->product->conn->prepare($query);
 
    // sanitize
    $keywords=htmlspecialchars(strip_tags($keywords));
    $keywords = "%{$keywords}%";
 
    // bind
    $stmt->bindParam(1, $keywords);
    $stmt->bindParam(2, $keywords);
    $stmt->bindParam(3, $keywords);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}


}