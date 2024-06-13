<?php
require 'model/getAppointments.php';
require 'model/getHealthWorkers.php';


$healthWorkers = loadHealthWorker();
print_r($healthWorkers);
$id = $_GET['edit'];
$appointments = loadAppoitments();
foreach($appointments as $appointment){
    if($appointment['appointment_id'] == $id){
        $healthWorkerName = $appointment['health_worker_name'];
        $patientName = $appointment['patient_name'];
        $appointmentDate = $appointment['appointment_date'];
        $appointmentStatus = $appointment['appointment_status'];
    }
}
 
require 'views/patient/editAppointment.view.php';