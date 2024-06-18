<!-- index.php -->
<?php
// $controller = isset($_GET['controller']) ? $_GET['controller'] : 'Product';
// $action = isset($_GET['action']) ? $_GET['action'] : 'productList';

// require_once "controllers/${controller}Controller.php";

// $controllerClassName = "${controller}Controller";
// $controllerObj = new $controllerClassName();

// $controllerObj->$action();

// require_once 'models/ProductModel.php';
// require_once 'controllers/ProductController.php';

// // Kết nối đến CSDL (ví dụ MySQL)
// $db = new PDO('mysql:host=localhost;dbname=mvc_app', 'root', '');
// $productModel = new ProductModel($db);
// $productController = new ProductController($productModel);
// $productController->listProducts();

// ?><?php
// require_once 'models/ProductModel.php';
// require_once 'controllers/ProductController.php';

// // Kết nối đến CSDL (ví dụ MySQL)
// try {
//     $db = new PDO('mysql:host=localhost;dbname=mvc_app', 'root', '');
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
//     exit;
// }

// $productModel = new ProductModel($db);
// $productController = new ProductController($productModel);

// $action = isset($_GET['action']) ? $_GET['action'] : 'listProducts';

// switch ($action) {
//     case 'listProducts':
//         $productController->listProducts();
//         break;
//     case 'createProduct':
//         $productController->createProduct();
//         break;
//     default:
//         echo "Action not recognized.";
//         break;
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>List Product</title>
</head>
<body>
    
</body>
</html>
<?php
    include "models/DBconfig.php";
    $db = new Database;
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    } else {
        $controller = '';
    }

    switch($controller){
        case 'list': 
            require_once('controllers/Controller.php');
    }
?>

