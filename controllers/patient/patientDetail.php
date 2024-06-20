<?php

require 'model/getData.php';

$p_id = $_GET['patient_id'];
$trackedPatients = trackPatients($p_id);


require 'views/patient/patientDetails.view.php';