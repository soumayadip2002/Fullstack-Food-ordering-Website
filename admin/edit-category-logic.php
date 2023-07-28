<?php  
    require 'config/database.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['cdesc'];

        $message = "<pre>$description</pre>";

        if(!$title || !$message){
            $_SESSION['edit-category'] = "Invalid input, please chcek your input";
        }
        else{
            $query = "SELECT * from category where ctitle='$title'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>1){
                $_SESSION['edit-category'] =  "Category already existed";
            }
        }

        if(isset($_SESSION['edit-category'])){
            header('location: ' . ROOT_URL . 'admin/edit-category.php');
            die();
        }
        else{
            $update_query = "UPDATE category set ctitle=?, cdescription=? where cid='$id'";
            $stmt = mysqli_prepare($conn, $update_query);
            mysqli_stmt_bind_param($stmt, "ss", $title, $description);
            $result_category = mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

            if(!mysqli_errno($conn)){
                $_SESSION['edit-category-success'] = "Category $title updated successfully";
            }
            else{
                $_SESSION['edit-category'] = "Category $title couldn't update";
            }
        }
    }

    header('location: ' . ROOT_URL . 'admin/manage-category.php');
    die();
?>