<?php

require_once('../conn.php');
require_once('../functions.php');


// print_r($_GET);
function theBlogs(){
    global $conn;
    // if ( empty($_GET['blog_id'] )) {
    //     $query = $conn->query(
    //         "SELECT b.*, d.username

    //         from blogs b 

    //         left join design_users d on d.user_id = b.owner_id

    //         where b.`status`=1

    //         order by b.blog_id desc  limit 5 ;");
    // }
    if (isset($_GET['getBlogs'])) {
        $current_page_res = $_GET['index'];
        $query = $conn->query(
            "SELECT b.*, d.username

            from blogs b 

            left join design_users d on d.user_id = b.owner_id

            where b.`status`=1

            order by b.blog_id desc  limit $current_page_res,8 
        ;");
    }
    if (isset($_GET['blog_id'])) {
        # code...
        $blog_id = $_GET['blog_id'];
        $query = $conn->query(
            "SELECT b.*, d.username

            from blogs b 

            left join design_users d on d.user_id = b.owner_id

            where b.`status`=1 and b.blog_id = $blog_id
 
        ;");
    }

    $big_container_array = [];

    while ($a = $query->fetch_assoc()) {
        array_push($big_container_array, $a);
    }


    echo json_encode($big_container_array);

    echo $conn->error;
}

theBlogs();
