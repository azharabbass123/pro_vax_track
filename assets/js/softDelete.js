
$(document).ready(function(){
    deleteVaxRec = function(id) {
         $.ajax({
           url: 'model/removeVaxRec.php',
           method: 'post',
           data: { id: id }, 
           success: function(response){
             if(response == 1){
               alert(`Record deleted successfully!`);
               document.getElementById(id).style.display = "none";
             } else if(response == 0){
               alert(`This field cannot be deleted. ${id}`);
             } else{
               alert(`Unexpected response ${response}`);
             }
           },
           error: function(jqXHR, textStatus, errorThrown) {
           alert(`Error: ${textStatus}, ${errorThrown}`);
           }
         })
       }

    deleteAptRec = function(id) {
         $.ajax({
           url: 'model/removeAptRec.php',
           type: 'POST',
           data: {id: id},
           success:function(response){
             if(response == 1){
               alert(`Record deleted successfully!`);
               document.getElementById(id).style.display = "none";
             } else if(response == 0){
               alert(`This field cannot be deleted. ${id}`);
             }
           }
         })
     }

     deleteHw = function(id) {
        $.ajax({
          url: 'model/removeHw.php',
          type: 'POST',
          data: {id: id},
          success:function(response){
            if(response == 1){
              alert(`Record deleted successfully!`);
              document.getElementById(id).style.display = "none";
            } else if(response == 0){
              alert(`This field cannot be deleted. ${id}`);
            }
          }
        })
    }

    deletePatient = function(id) {
        $.ajax({
          url: 'model/removePatient.php',
          type: 'POST',
          data: {id: id},
          success:function(response){
            if(response == 1){
              alert(`Record deleted successfully!`);
              document.getElementById(id).style.display = "none";
            } else if(response == 0){
              alert(`This field cannot be deleted. ${id}`);
            }
          }
        })
    }
   })