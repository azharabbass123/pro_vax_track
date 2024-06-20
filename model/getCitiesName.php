<?php

require 'Database.php';
if (isset( $_POST['prvId'])){
    $db = new Database();
    $stm = $db->query('SELECT * FROM cities WHERE province_id = ' . $_POST['prvId']. ' ORDER BY name ASC');
    $cities = $stm->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($cities);
}