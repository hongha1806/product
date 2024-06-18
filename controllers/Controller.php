<?php
    

    if(isset($_GET['action'])){
        $action = $_GET['action'];
    } else {
        $action = '';
    }

    $thanhcong = array();

    switch($action){
        case 'add': {
            if(isset($_POST['add_product'])){
                $name = $_POST['name'];
                $price = $_POST['price'];

                if($db->insertData($name, $price)){
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
                if(isset($_POST['update_product'])){
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    if($db->updateData($id, $name, $price)){
                        header('location: index.php?controller=list&action=list');
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
            //require_once('views/delete.php');
            break;
        }
        case 'list':{
            $tblTable= "products";
            $data = $db->getAllData($tblTable);
            require_once('views/product-list.php');
            break;
        }
        case 'search':{
            if(isset($_GET['tukhoa'])){
                $tukhoa = $_GET['tukhoa'];
                $tblTable = "products";

                $dataSearch =$db->searchData($tblTable, $tukhoa);
            }
            require_once('views/search.php');
            break;
        }
        default:{
            $tblTable = "products";
            $data = $db->getAllData($tblTable);
            require_once('views/product-list.php');
            break;
        }
    }

    
?>