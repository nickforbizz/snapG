<?php

require_once('../conn.php');

// echo "contact data here";

$array_data = [];
$query = $conn->query("SELECT count(*) as totalMessages from contact");

$a = $query->fetch_assoc();
array_push($array_data, $a['totalMessages']);


echo json_encode($array_data);