<?php


require 'model/getAppointments.php';
require 'model/getVaccination.php';



$appointments = loadAppoitments();
$vaccinations = loadVaccinations();



require 'views/health_worker/index.view.php';