<?php

require 'model/getData.php';

$appointments = loadAppoitments();

$vaccinations = loadVaccinations();

$getPatientsByProvince = getPatientsByProvince();



require 'views/health_worker/index.view.php';