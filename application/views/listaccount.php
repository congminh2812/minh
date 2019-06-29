<?php 
    if(!$this->session->has_userdata('name')){
        echo 'You need login account !!!';
        return;
    }
        
?>
<div class="box box-danger">
     
     <table class="table table-hover">
       <thead>
         <tr>
           <th>STT</th>
           <th>Display Name</th>
           <th>Email</th>
         </tr>
       </thead>
       <tbody>
        
               <?php
               $stt = 1;
                foreach ($account as $key => $value) {
                    echo '<tr>
                            <td>
                                '.$stt.'
                            </td>
                        ';
                    echo '
                            <td>
                                '.$value['displayname'].'
                            </td>
                        ';
                        echo '
                            <td>
                                '.$value['email'].'
                            </td>
                        </tr>';
                        $stt++;
                }
               ?>
         
       </tbody>
     </table>
     
  </div>