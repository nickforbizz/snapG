
<?php

require_once('../conn.php');



$query = $conn->query("SELECT count(blog_id) as num from blogs where blogs.`status` = 1");

echo $conn->error;

$a = $query->fetch_assoc();

echo $a["num"];