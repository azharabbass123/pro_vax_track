<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
?>
<section
      id="hero" style="overflow-y: scroll">
      <!-- The sidebar -->
    <div class="mySidebar">
    <h3 class="text-info mb-4">
          Admin Dashboard
</h3>
<hr>
      <button class="myActive-button mySidebar-btn" id="hw" onclick="health_worker_card()"> Health Workers</button>
      <button class="mySidebar-btn" onclick="patient_card()" id="patient">Pateints</button>
      <button class="mySidebar-btn" onclick="appointment_card()" id="appointment">Appointments</button>
      <button class="mySidebar-btn" onclick="vaccination_card()" id="vaccination">Vaccination</button>
    </div> 

    <!-- Page content -->
    <div class="container" id="myContainer">
      <div class="row mt-2">
        <div class="col">
          <!-- Health worker table  -->
          <?= require 'health_workers_table.php' ?>
          <!-- patients table  -->
          <?= require 'patients_table.php'?>
          <!-- appointments table  -->
          <?= require 'vaccination_table.php' ?>
          <!-- vaccination table  -->
          <?= require 'appointment_table.php' ?>
        </div>
      </div>
    </div> 
    </section>
    <?php
require 'views/partials/bottom.php';