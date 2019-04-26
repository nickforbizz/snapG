<?php

require_once('../conn.php');
require_once('../functions.php');


// print_r($_GET);
function theBlogs(){
    global $conn;
    if (isset($_GET['blog_id'])) {
        # code...
        $blog_id = $_GET['blog_id'];
        $query = $conn->query(
            "UPDATE blogs
            SET blogs.`status` = 0
             WHERE blogs.blog_id = $blog_id 
        ;");
    }


    echo $conn->error;
}

theBlogs();