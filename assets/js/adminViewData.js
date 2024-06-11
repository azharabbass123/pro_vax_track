
// This file is required in admin view to show data 
$(document).ready(function() {
    $('.table').DataTable();
    $('#patient_card').hide();
    $('#appointment_card').hide();
    $('#vaccination_card').hide();
    //getHealthWorkers();
    health_worker_card = function (){
      $('#patient').removeClass('myActive-button');
      $('#appointment').removeClass('myActive-button');
      $('#vaccination').removeClass('myActive-button');
      $('#hw').addClass('myActive-button');
      $('#health_worker_card').show();
      $('#patient_card').hide();
      $('#appointment_card').hide();
      $('#vaccination_card').hide();
    };
    patient_card = function () {
      $('#patient').addClass('myActive-button');
      $('#appointment').removeClass('myActive-button');
      $('#vaccination').removeClass('myActive-button');
      $('#hw').removeClass('myActive-button');
      $('#patient_card').show();
      $('#health_worker_card').hide();
      $('#appointment_card').hide();
      $('#vaccination_card').hide();
    }
    appointment_card = function () {
      $('#patient').removeClass('myActive-button');
      $('#appointment').addClass('myActive-button');
      $('#vaccination').removeClass('myActive-button');
      $('#hw').removeClass('myActive-button');
      $('#patient_card').hide();
      $('#health_worker_card').hide();
      $('#appointment_card').show();
      $('#vaccination_card').hide();
    }
    vaccination_card = function () {
      $('#patient').removeClass('myActive-button');
      $('#appointment').removeClass('myActive-button');
      $('#vaccination').addClass('myActive-button');
      $('#hw').removeClass('myActive-button');
      $('#patient_card').hide();
      $('#health_worker_card').hide();
      $('#appointment_card').hide();
      $('#vaccination_card').show();
    }
  })