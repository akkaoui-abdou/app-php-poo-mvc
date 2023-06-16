<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/database.php';
 
// instantiate product Class
include_once '../Class/product.php';

// instantiate product object
include_once '../Controller/ProductController.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new ProductNameSpace\Product($db);

# set product property values
$product->name = "product";
$product->price = 22222;
$product->description = "description";
$product->category_id = 1;
$product->created = date('Y-m-d H:i:s');

#For Create new Product
$productC = new ProductControllerNameSpace\ProductController($product);
if($productC->create()){
    // tell the user
    echo json_encode(array("message" => "Product was created."));
}


#For Create new Product
$productC = new ProductControllerNameSpace\ProductController($product);
# set product id to be deleted
$id= 65;
# delete the product
if($productC->delete($id)){
    # Show message for user
    echo json_encode(array("message" => "Product was deleted."));
}










