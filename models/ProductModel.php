<?php
class ProductModel {
    // public static function getProducts() {

    //     return [
    //         ['id' => 1, 'name' => 'Product A', 'price' => 100],
    //         ['id' => 2, 'name' => 'Product B', 'price' => 150],
    //         ['id' => 3, 'name' => 'Product C', 'price' => 200],
    //     ];
    // }

    protected $db;

   
    public function __construct() {
        $dsn = 'mysql:host=localhost;dbname=mvc_app'; 
        $username = 'root'; 
        $password = ''; 

        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Lỗi kết nối đến cơ sở dữ liệu: " . $e->getMessage();
            die();
        }
    }
    
        public function getAllProducts() {
            $stmt = $this->db->query("SELECT * FROM products");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    
        public function createProduct($name, $price) {
            $stmt = $this->db->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
            return $stmt->execute([$name, $price]);
        }
    
        public function getProductById($id) {
            $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    
        public function updateProduct($id, $name, $price) {
            $stmt = $this->db->prepare("UPDATE products SET name = ?, price = ? WHERE id = ?");
            return $stmt->execute([$name, $price, $id]);
        }
    
        public function deleteProduct($id) {
            $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
            return $stmt->execute([$id]);
        }
    
    
}
?>
