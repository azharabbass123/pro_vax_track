<?php

require 'model/getData.php';

$p_id = $_GET['province_id'];

$trackPatientsByProvince = trackPatientsByProvince($p_id);
print_r($trackPatientsByProvince);

require 'views/patient/patientDetails.view.php';