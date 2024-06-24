<?php

require 'model/getData.php';

//print_r($vaccinations);
// print_r($appointments);
// showData($healthWorkers);

// function showData($fetchData) {
//     if(count($fetchData)>0){
//         $sn=1;
//         foreach($fetchData as $data){ 
//     echo "<tr>
//             <td>".$sn."</td>
//             <td>".$data['name']."</td>
//             <td>".$data['email']."</td>
//             <td>".$data['city_name']."</td>
//             <td><a href='crud-form.php?edit=".$data['id']."'>Edit</a></td>
//             <td><a href='crud-form.php?delete=".$data['id']."'>Delete</a></td>
//      </tr>";
         
//     $sn++; 
//        }
//   }else{
       
//     echo "<tr>
//           <td colspan='7'>No Data Found</td>
//          </tr>"; 
//   }
//}

require 'views/admin/index.view.php';