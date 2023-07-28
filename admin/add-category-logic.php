<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){
        $title = $_POST['ctitle'];
        $description = $_POST['cdesc'];

        if(!$title)
            $_SESSION['category-add'] = "Please put title";
        elseif(!$description)
            $_SESSION['category-add'] = "Please add Description";
        
        else{
            $select_query = "SELECT * from category where ctitle='$title'";
            $result = mysqli_query($conn, $select_query);

            if(mysqli_num_rows($result)==1){
                $_SESSION['category-add'] = "Category already existed";
            }
        }

        if(isset($_SESSION['category-add'])){
            $_SESSION['category-add-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
        }
        else{
            $query_category = "INSERT INTO category (ctitle, cdescription) VALUES (?, ?)";
            $stmt = mysqli_prepare($conn, $query_category);
            mysqli_stmt_bind_param($stmt, "ss", $title, $description);
            $result_category = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if(!mysqli_errno($conn)){
                $_SESSION['category-add-success'] = "New Category - $title - added successfully";
                header('location: ' . ROOT_URL . 'admin/manage-category.php');
                die();
            }
        }
    }
    else{
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();
    }

?>