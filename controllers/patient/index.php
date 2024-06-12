<?php 

require 'model/getVaccination.php';
require 'model/getAppointments.php';

$appointments = loadAppoitments();
$vaccinations = loadVaccinations();
require 'views/patient/index.view.php';