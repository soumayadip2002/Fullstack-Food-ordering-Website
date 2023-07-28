<?php
    require 'config/database.php';

    
    if(isset($_POST['submit'])){
        $id = $_POST['did'];
        $previous_link = $_POST['previous_pic'];
        $dname = $_POST['dname'];
        $dprice = $_POST['dprice'];
        $dquantity = $_POST['dquantity'];
        $dcategory = $_POST['dcategory'];
        $type = $_POST['type'];
        $is_featured = isset($_POST['is_featured'])?1:0;
        $is_popular = isset($_POST['is_popular'])?1:0;
        $is_today_special = isset($_POST['is_today_special'])?1:0;
        $description = $_POST['cdesc'];
        $description = mysqli_real_escape_string($conn, $description);
        $ingredients = $_POST['ingredients'];
        $ingredients = mysqli_real_escape_string($conn, $ingredients);
        $drating = 0;
        $thumbnail = $_FILES['thumbnail'];
        


        if(!$dname || !$dprice || !$description  || !$type || !$ingredients )
            $_SESSION['edit-dish'] = "Invalid input, Check your input";
        else{

            if($thumbnail['name']){
                $previous_pic_path = '../upload/' . $previous_link;

                if($previous_pic_path)
                    unlink($previous_pic_path);

                $query = "select * from dish where did='$id'";
                $result = mysqli_query($conn, $query);
                if(mysqli_num_rows($result)>1){
                    $_SESSION['edit-dish'] = "$dname already exist";
                }

                $thumb_name = $thumbnail['name'];
                $thumb_temp = $thumbnail['tmp_name'];
                $thumb_destination = '../upload/' . $thumb_name;
                $allowed_files = ['png', 'jpeg', 'jpg','webp'];
                $extension = explode('.', $thumb_name);
                $extension = end($extension);
                if(in_array($extension, $allowed_files)){
                    move_uploaded_file($thumb_temp, $thumb_destination);
                }
                else{
                    $_SESSION['edit-dish'] = "File should be in png, jpg, jpeg, webp format";
                }
            }
            
        }

        if(isset($_SESSION['edit-dish'])){
            $_SESSION['edit-dish-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/edit-dish.php');
            die();
        }
        else{
            $thumnail_to_insert = $thumb_name ?? $previous_link;
            $query = "update dish set dname='$dname', drating='$drating' , dprice='$dprice', quantity='$dquantity', dcategory='$dcategory', type='$type', ingredients='$ingredients', is_featured='$is_featured', 
            is_popular='$is_popular', dpicture='$thumnail_to_insert', is_today='$is_today_special', description='$description' where did='$id' limit 1 ";
            $result = mysqli_query($conn, $query);

            if(!mysqli_errno($conn)){
                $_SESSION['edit-dish-success'] = "Dish $dname updated successfully 🍕🍕";
                header('location: ' . ROOT_URL . 'admin/');
                die();
            }
            else{
                $_SESSION['edit-dish'] = "Dish $dname couldn't update 😪😪";
                header('location: ' . ROOT_URL . 'admin/');
                die();
            }
        }

    }

    else{
        header('location: ' . ROOT_URL . 'admin/edit-dish.php');
        die();
    }
?>