<?php

require 'Database.php';
$db = new Database();

$id = $_POST['id'];
$db->query("UPDATE vaccinations SET
             deleted_at = NOW()
             WHERE id = :id",[
                'id' => $id
             ]);
echo 1;
