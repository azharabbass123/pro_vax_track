<?php

require 'model/getData.php';

$blockedUsers = getDeletedUsers();

require 'views/patient/patientDetails.view.php';