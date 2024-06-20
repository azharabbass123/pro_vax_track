<?php

require 'model/getData.php';

$appointments = loadAppoitments();

$vaccinations = loadVaccinations();



require 'views/health_worker/index.view.php';