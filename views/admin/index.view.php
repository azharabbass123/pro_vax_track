<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
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
      <button class="mySidebar-btn" onclick="appointment_card()" id="appointment">Appointments</button>
      <button class="mySidebar-btn" onclick="vaccination_card()" id="vaccination">Vaccination</button>
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
          <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">name</th>
          <th class="bg-primary text-white text-center">eamil</th>
          <th class="bg-primary text-white text-center">city</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="health_worker_data">
        <?php 
              $sn = 1;
              foreach ($healthWorkers as $healthWorker){
                ?>
                <tr id="<?=$healthWorker['id']?>">
                <td> <?= $sn?></td>
                <td><?= $healthWorker['name'] ?></td>
                <td><?= $healthWorker['email'] ?></td>
                <td><?= $healthWorker['city_name'] ?></td>
                <td><a href='#' onclick="deleteHw(<?=$healthWorker['id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php $sn++; } 
              ?>
              
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
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">name</th>
          <th class="bg-primary text-white text-center">eamil</th>
          <th class="bg-primary text-white text-center">city</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="patient_data">
        <?php 
              $sn = 1;
              foreach ($patients as $patient){
                ?>
                <tr id="<?=$patient['id']?>">
                <td> <?= $sn?></td>
                <td><?= $patient['name'] ?></td>
                <td><?= $patient['email'] ?></td>
                <td><?= $patient['city_name'] ?></td>
                <td><a href='#' onclick="deletePatient(<?=$patient['id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php $sn++; } 
              ?>
              
        </tbody>
      </table>
    </div>
          </div>
          <!-- appointments table  -->
          <div id="appointment_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Appointments</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Patient Name</th>
          <th class="bg-primary text-white text-center">Health Worker</th>
          <th class="bg-primary text-white text-center">Date</th>
          <th class="bg-primary text-white text-center">Status</th>
          <th class="bg-primary text-white text-center">Edit</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="appointment_data">
        <?php 
              $sn = 1;  
              foreach ($appointments as $appointment){
                ?>
                <tr id="<?=$appointment['appointment_id']?>">
                <td> <?= $sn?></td>
                <td><?= $appointment['patient_name'] ?></td>
                <td><?= $appointment['health_worker_name'] ?></td>
                <td><?= $appointment['appointment_date'] ?></td>
                <td><?= $appointment['appointment_status'] ?></td>
                <td><a href='editAppointment?edit=<?=$appointment['appointment_id']?>' class="btn btn-sm btn-primary">Edit</a></td>
                <td><a href='#' onclick="deleteAptRec(<?=$appointment['appointment_id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php $sn++; }
              ?>
              
        </tbody>
      </table>
    </div>
          </div>
          <!-- vaccination table  -->
          <div id="vaccination_card" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Vaccinations Schedule</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
        <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Patient Name</th>
          <th class="bg-primary text-white text-center">Date</th>
          <th class="bg-primary text-white text-center">Status</th>
          <th class="bg-primary text-white text-center">Edit</th>
          <th class="bg-primary text-white text-center">Delete</th>
        </tr>
        </thead>
        <tbody id="vaccination_data">
        <?php 
              $sn = 1;
              foreach ($vaccinations as $vaccination){
                ?>
                <tr id="<?=$vaccination['vaccination_id']?>">
                <td> <?= $sn?></td>
                <td><?= $vaccination['patient_name'] ?></td>
                <td class="text-center"><?= $vaccination['vaccination_date'] ?></td>
                <td><?= $vaccination['vaccination_status'] ?></td>
                <td><a href='editVaccination?edit=<?=$vaccination['vaccination_id']?>' class="btn btn-sm btn-primary">Edit</a></td>
                <td><a href='#' onclick="deleteVaxRec(<?=$vaccination['vaccination_id']?>)" class="btn btn-sm btn-danger">Delete</a></td>
              </tr>
              <?php
               $sn++; }
              ?>
              
        </tbody>
      </table>
    </div>
          </div>
        </div>
      </div>
    </div> 
    </section>
    <?php
require 'views/partials/bottom.php';