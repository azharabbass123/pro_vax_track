<?php

require 'Database.php';
if (isset( $_POST['prvId'])){
    $db = new Database();
    $stm = $db->query('SELECT name FROM cities WHERE province_id = ' . $_POST['prvId']);
    $cities = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cities);
}