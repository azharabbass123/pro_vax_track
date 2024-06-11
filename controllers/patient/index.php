<?php 

require 'model/getVaccination.php';



$vaccinations = loadVaccinations();
require 'views/patient/index.view.php';