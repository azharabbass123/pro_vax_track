<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
require 'model/getHealthWorkers.php';
require 'model/getPatient.php';
?>
<section
      id="hero">
      <!-- The sidebar -->
    <div class="mySidebar">
    <h3 class="text-info mb-4">
          Admin Dashboard
</h3>
<hr>
      <button class="myActive-button mySidebar-btn" id="hw" onclick="health_worker_card()"> Health Workers</button>
      <button class="mySidebar-btn" onclick="patient_card()" id="patient">Pateints</button>
      <button class="mySidebar-btn" >Appointments</button>
      <button class="mySidebar-btn" >Vaccination</button>
    </div> 

    <!-- Page content -->
    <div class="container" id="myContainer">
      <div class="row mt-2">
        <div class="col">
          <!-- Health worker table  -->
          <div id="health_worker_card" class="card mt-5">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Registered Health Workers</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th class="bg-primary text-white">Sr.</th>
          <th class="bg-primary text-white">name</th>
          <th class="bg-primary text-white">eamil</th>
          <th class="bg-primary text-white">city</th>
        </tr>
        </thead>
        <tbody>
        <?php 
              $healthWorkers = loadHealthWorkerWithCity();
              foreach ($healthWorkers as $healthWorker){
                ?>
                <tr>
                <td> <?= $healthWorker['id'] ?></td>
                <td><?= $healthWorker['name'] ?></td>
                <td><?= $healthWorker['email'] ?></td>
                <td><?= $healthWorker['city_name'] ?></td>
              </tr>
              <?php } ?>
              
        </tbody>
      </table>
    </div>
          </div>
          <!-- patients table  -->
          <div id="patient_card" class="card mt-5">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Registered Patients</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th class="bg-primary text-white">Sr.</th>
          <th class="bg-primary text-white">name</th>
          <th class="bg-primary text-white">eamil</th>
          <th class="bg-primary text-white">city</th>
        </tr>
        </thead>
        <tbody>
        <?php 
              $patients = loadPatientWithCity();
              foreach ($patients as $patient){
                ?>
                <tr>
                <td> <?= $patient['id'] ?></td>
                <td><?= $patient['name'] ?></td>
                <td><?= $patient['email'] ?></td>
                <td><?= $patient['city_name'] ?></td>
              </tr>
              <?php } ?>
              
        </tbody>
      </table>
    </div>
          </div>
        </div>
      </div>
    </div> 
    
    </section>
    <script>
      $(document).ready(function() {
        $('.table').DataTable();
        $('#patient_card').hide();
        health_worker_card = function (){
          $('#patient').removeClass('myActive-button');
          $('#hw').addClass('myActive-button');
          $('#health_worker_card').show();
          $('#patient_card').hide();
        };
        patient_card = function () {
          $('#patient').addClass('myActive-button');
          $('#hw').removeClass('myActive-button');
          $('#patient_card').show();
          $('#health_worker_card').hide();
        }
      })
    </script>
    <?php
require 'views/partials/bottom.php';