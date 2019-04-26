<?php

require_once('../conn.php');
include_once('../functions.php');

print_r($_POST);
print_r($_FILES);


$time=time();



if (isset($_POST['blog_title'])) {
    $blog_title = validateData($_POST['blog_title']);
    $the_blog = validateData($_POST['the_blog']);
    $blog_description = validateData($_POST['blog_description']);
    $img_categories = validateData($_POST['img_categories']);
    $owner_id = validateData($_POST['owner_id']);
    $blog_id = validateData($_POST['blog_id']);


    if (isset($_FILES['img_upload']) ) {
        
    
    
    
        $location = "../uploads/blogImgs/";
        $location_standard = "uploads/blogImgs/";
        $file_ext = strtolower(end(explode('.', $_FILES['img_upload']['name']) ));
        $upload_name =$_FILES['img_upload']['name'];
        $target = $upload_name;
        $file_tmp = $_FILES['img_upload']['tmp_name'];
        $img_upload_size = $_FILES['img_upload']['size'];
        $img_upload_type = $_FILES['img_upload']['type'];
        $error = $_FILES['img_upload']['error'];
        $name = $_FILES['img_upload']['name'];
        // $category = $_POST['img_categories'];
        // $ratings = $_POST['points1'];
        $ok = 1;
    
        $filetype = strtolower(end(explode('/', $_FILES['img_upload']["type"])));
    
        // code to post current user
        $current_user = "Wainaina Nicholas";
    
    
            // place some value if $about is empty
        if (empty($name)) {
            $link = $_FILES['img_upload']['name'];
        }
        $expensions = array("gif", "jpeg", "jpg", "png");
            // check the file type and set $ok var
        if (in_array($file_ext, $expensions) === false ){
            echo "please Upload images Only".'<br>';
            $ok = 0;
        }
            //check the size of file and set $ok var
        if ($img_upload_size < 10 ){
            echo "The file is too small.".'<br>';
            echo "img_upload size is : ".$img_upload_size.'<br>';
            $ok = 0;
        }
    
        if (file_exists($target)){
            echo "Sorry, file already exists".'<br>';
            $ok = 0;
        }else {
    
            //use $ok var to submit data
            if (!empty($upload_name) ) {
                if ($ok == 0 ){
                    echo "The file couldn't be img_upload ".'<br>';
    
                }
                    //store the file to server
    
                else if(move_uploaded_file($file_tmp,$location.$time.'.'.$filetype)){
    
    
                    $uploadnamex2 = $location_standard.$time.'.'.$filetype;
                    //store the filename and about to the database

                    if (empty($_POST['blog_id'])) {
                        
                        $query = $conn->query("INSERT INTO `blogs` (img_link, img_name, img_type, title, blog_description, content, category, owner_id)
                                                VALUES ('$uploadnamex2', '$name',  '$filetype', '$blog_title', '$blog_description', '$the_blog', '$img_categories', '$owner_id')");
                                                     
        
                     }else {
                         $query_edited = $conn->query("UPDATE blogs
                         SET blogs.`status` = 0, blogs.owner_id = '$owner_id'
                          WHERE blogs.blog_id = '$blog_id' ");

                        $query = $conn->query("INSERT INTO `blogs` (img_link, img_name, img_type, title, blog_description, content, category, owner_id)
                        VALUES ('$uploadnamex2', '$name',  '$filetype', '$blog_title', '$blog_description', '$the_blog', '$img_categories', '$owner_id')");
                          
                     }

                                // unset($_POST['upload']);
                                // header("Location: images.php");

                     echo $conn->error;
                                
                                
                // Downloading file
                    }
            }else {
                    $ok = 0;
                    echo "This file couldn't be img_upload ".'<br>';
                    echo $error;
                    }
            }
        } else {
            $query = $conn->query("INSERT INTO `blogs` (title, blog_description, content, category, owner_id) VALUES(
                '$blog_title', '$blog_description', '$the_blog', '$img_categories', '$owner_id'
            ) ");
    echo $conn->error;
    }


}

