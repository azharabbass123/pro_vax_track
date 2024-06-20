<?php 

require 'model/getData.php';


$appointments = loadAppoitments();
$vaccinations = loadVaccinations();
require 'views/patient/index.view.php';