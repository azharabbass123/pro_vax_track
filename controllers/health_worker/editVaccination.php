<?php
require 'model/getVaccination.php';
require 'model/getPatient.php';

$patients = loadPatient();

$id = $_GET['edit'];
$vaccinations = loadVaccinations();
foreach($vaccinations as $vaccination){
    if($vaccination['vaccination_id'] == $id){
        $patientName = $vaccination['patient_name'];
        $vaccinationDate = $vaccination['vaccination_date'];
        $vaccinationStatus = $vaccination['vaccination_status'];
    }
}



require 'views/health_worker/editVaccination.view.php';