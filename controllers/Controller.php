<?php
    // Số sản phẩm mỗi trang
    $limit = 5;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    $offset = ($page - 1) * $limit;

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    $thanhcong = array();

    switch($action){
        case 'add': {
            $brands = $db->getAllBrands(); // Fetch brands from database
            if(isset($_POST['add_product'])){
                $name = $_POST['name'];
                $price = $_POST['price'];
                $id_brand = $_POST['id_brand'];
                if($db->insertData($name, $price, $id_brand)){
                    $thanhcong[] = 'add_success';
                }
            }
            require_once('views/create.php');
            break;
        }
        case 'edit': {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "products";
                $dataID = $db->getDataID($tblTable, $id);
                $brands = $db->getAllBrands();
                if(isset($_POST['update_product'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $id_brand = $_POST['id_brand'];
                    
                    if($db->updateData($id, $name, $price, $id_brand)){
                        $thanhcong[] = 'update_success';
                        $dataID = $db->getDataID($tblTable, $id);
                    }
                }
            }   
            require_once('views/edit.php');
            break;
        }
        
        case 'delete': {
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $tblTable = "products";
                if($db->delete($id, $tblTable)){
                    header('location: index.php?controller=list&action=list');
                }
            }else{
                header('location: index.php?controller=list&action=list');
            }
            break;
        }
        case 'list':{
            $tblTable = "products";
            $data = $db->getPaginatedData($tblTable, $limit, $offset);
            $totalRows = $db->getTotalRows($tblTable);
            $totalPages = ceil($totalRows / $limit);
            require_once('views/product-list.php');
            break;
        }
        case 'search': {
            $tblTable = 'products';
            $key = isset($_GET['tukhoa']) ? $_GET['tukhoa'] : '';
            $price = isset($_GET['gia']) ? $_GET['gia'] : null;
            $totalRows = $db->getTotalSearchRows($tblTable, $key, $price);
            $totalPages = ceil($totalRows / $limit);
            $dataSearch = $db->searchData($tblTable, $key, $price, $limit, $offset);
            require_once 'views/search.php';
            break;
            }      
        default:{
            $tblTable = "products";
            $data = $db->getPaginatedData($tblTable, $limit, $offset);
            $totalRows = $db->getTotalRows($tblTable);
            $totalPages = ceil($totalRows / $limit);
            require_once('views/product-list.php');
            break;
        }
    }
?>
