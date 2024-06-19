<?php
class Database {
    private $hostname = 'localhost';
    private $username = 'root';
    private $pass = '';
    private $dbname = 'mvc_app';

    private $conn = NULL;
    private $result = NULL;

    // kết nối DB
    public function connect(){
        $this->conn = new mysqli($this->hostname, $this->username, $this->pass, $this->dbname);
        if(!$this->conn){
            echo "Kết nối thất bại";
            exit();
        } else {
            mysqli_set_charset($this->conn, 'utf8');
        }
        return $this->conn;
    }

    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    public function getData(){
        if($this->result){
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    public function getAllData($table){
        $sql = "SELECT * FROM $table";
        $this->execute($sql);
        if($this->num_rows() > 0){
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        } else {
            $data = 0;
        }
        return $data;
    }

    public function getDataID($table, $id){
        $sql = "SELECT * FROM $table WHERE id = '$id'";
        $this->execute($sql);
        if($this->num_rows() > 0){
            $data = mysqli_fetch_array($this->result);
        } else {
            $data = 0;
        }
        return $data;
    }

    public function num_rows(){
        if($this->result){
            $num = mysqli_num_rows($this->result);
        } else {
            $num = 0;
        }
        return $num;
    }

    // thêm mới
    public function insertData($name, $price){
        $sql = "INSERT INTO products(id, name, price) VALUES(null, '$name', '$price')";
        return $this->execute($sql);
    }

    // chỉnh sửa
    public function updateData($id, $name, $price){
        $sql = "UPDATE products SET name = '$name', price = '$price' WHERE id = '$id'";
        return $this->execute($sql);
    }

    //xóa
    public function delete($id, $table){
        $sql = "DELETE FROM $table WHERE id = '$id'";
        return $this->execute($sql);
    }

    //tìm kiếm 
    public function searchData($table, $key, $price = null, $limit, $offset) {
        $sql = "SELECT * FROM $table WHERE 1";
        
        if (!empty($key)) {
            $sql .= " AND name LIKE '%$key%'";
        }
        
        if (!empty($price)) {
            $sql .= " AND price < $price";
        }
        
        $sql .= " ORDER BY id DESC LIMIT $limit OFFSET $offset";
        
        $this->execute($sql);
        $data = [];
        
        if ($this->num_rows() > 0) {
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        } else {
            $data = null;
        }
        
        return $data;
    }
    
    public function getTotalSearchRows($table, $key, $price = null) {
        $sql = "SELECT COUNT(*) as count FROM $table WHERE 1";
        
        if (!empty($key)) {
            $sql .= " AND name LIKE '%$key%'";
        }
        
        if (!empty($price)) {
            $sql .= " AND price < $price";
        }
        
        $this->execute($sql);
        
        if ($this->num_rows() > 0) {
            $result = $this->getData();
            return $result['count'];
        } else {
            return 0;
        }
    }
    
    
    //phân trang list product
    public function getPaginatedData($table, $limit, $offset) {
        $sql = "SELECT * FROM $table LIMIT $limit OFFSET $offset";
        $this->execute($sql);
        $data = [];
        if($this->num_rows() > 0){
            while ($datas = $this->getData()) {
                $data[] = $datas;
            }
        } else {
            $data = 0;
        }
        return $data;
    }

    public function getTotalRows($table) {
        $sql = "SELECT COUNT(*) as count FROM $table";
        $this->execute($sql);
        if($this->num_rows() > 0){
            $result = $this->getData();
            return $result['count'];
        } else {
            return 0;
        }
    }
}
?>
