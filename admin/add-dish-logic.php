<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){
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
        


        if(!$dname)
            $_SESSION['add-dish'] = "Please add name of the dish";
        elseif(!$dprice)
            $_SESSION['add-dish'] = "Please add price of the dish";
        elseif(!$dcategory)
            $_SESSION['add-dish'] = "Please select category of the dish";
        elseif(!$type)
            $_SESSION['add-dish'] = "Please select type of the dish";
        elseif(!$ingredients)
            $_SESSION['add-dish'] = "Please add ingredients of the dish";
        elseif(!$description)
            $_SESSION['add-dish'] = "Please add description of the dish";
        elseif(!$thumbnail)
            $_SESSION['add-dish'] = "Please add Thumbnail";
        else{
            $query = "select * from dish where dname='$dname'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)==1){
                $_SESSION['add-dish'] = "$dname already exist";
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
                $_SESSION['add-dish'] = "File should be in png, jpg, jpeg, webp format";
            }
        }

        if(isset($_SESSION['add-dish'])){
            $_SESSION['add-dish-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-dish.php');
            die();
        }
        else{
            $query = "INSERT into dish (dname, drating , dprice,quantity, dcategory, type, ingredients	, is_featured, is_popular, dpicture, is_today, description)
            values ('$dname', '$drating', '$dprice','$dquantity', '$dcategory', '$type', '$ingredients', '$is_featured', '$is_popular', '$thumb_name',  '$is_today_special', '$description')";
            $result = mysqli_query($conn, $query);

            if(!mysqli_errno($conn)){
                $_SESSION['add-dish-success'] = "Dish $dname added successfully 🍕🍕";
                header('location: ' . ROOT_URL . 'admin/');
                die();
            }
        }

    }

    else{
        header('location: ' . ROOT_URL . 'admin/add-dish.php');
        die();
    }
?>