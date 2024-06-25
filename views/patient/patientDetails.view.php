<?php

require 'views/partials/header.php';
require 'views/partials/nav.php';
?>

<section class="hero">
 
<!-- sidebar  -->
<div class="mySidebar">
    </div> 

<!-- Page content -->
<div class="container" id="myContainer">
      <div class="row mt-2">
        <div class="col">
<!-- appointments table  -->
<div id="patient_details" class="card mt-2">
            <div class="card-header">
      <h3 class="display-6 fw-bold text-center text-primary">Blocked Users</h3>
    </div>
    <div class="card-body">
      <table id="table" class="table table-bordered table-striped text-center">
        <thead>
        <tr>
          <th class="bg-primary text-white text-center">Sr.</th>
          <th class="bg-primary text-white text-center">Name</th>
          <th class="bg-primary text-white text-center">Role</th>
          <th class="bg-primary text-white text-center">Un Block</th>
        </tr>
        </thead>
        <tbody id="appointment_data">
        <?php 
              $sn = 1;
              foreach ($blockedUsers as $blockedUser){
                ?>
            <tr id="<?=$blockedUser['id']?>">
            <td> <?= $sn?></td>
            <td><?= $blockedUser['name'] ?></td>
            <td><?= ($blockedUser['role_id'] == 2) ? 'Health Worker' : 'Patient';?></td>
            <td><a href="#" onclick="unblockUser(<?= $blockedUser['id'] ?>)" class="btn btn-sm btn-success">Un-Block</a></td>
            </tr>
              <?php 
              $sn++ ;}
              ?>
              
        </tbody>
      </table>
      <a
          href="admin"
          class="bg-info w-50 mt-5 mx-2 text-center text-white text-decoration-none p-2 rounded"
          >Go Back</a>
    </div>
          </div>
        </div>
      </div>
    </div>
</section>

<?php
require 'views/partials/bottom.php';