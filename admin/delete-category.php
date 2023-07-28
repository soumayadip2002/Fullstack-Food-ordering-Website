<?php
    require 'config/database.php';
    if(isset($_GET['cid'])){
        $id = $_GET['cid'];

        $select_query = "select * from category where cid='$id'";
        $select_result = mysqli_query($conn, $select_query);
        $select_category = mysqli_fetch_assoc($select_result);
        $query = "DELETE from category where cid='$id'";
        $result = mysqli_query($conn, $query);

        if(!mysqli_errno($conn)){
            $_SESSION['delete-category-success'] = "Category {$select_category['ctitle']} deleted successfully";
        }
        else{
            $_SESSION['delete-category'] = "Category {$select_category['ctitle']} couldn't delete";
        }
    }

    header('location: ' . ROOT_URL . 'admin/manage-category.php');

?>