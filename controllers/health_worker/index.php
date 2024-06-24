<?php

require 'model/getData.php';

$appointments = loadAppoitments();

$vaccinations = loadVaccinations();

$userId = $_SESSION['user']['curUserId'];
$p_id = getProvince($userId);
$trackPatientsByProvince = trackPatientsByProvince($p_id);


require 'views/health_worker/index.view.php';