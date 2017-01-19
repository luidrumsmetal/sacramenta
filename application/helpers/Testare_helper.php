<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function testare($ci){
      if (is_numeric($ci)) {
        $db= new mysqli("localhost", "root","","sacramenta");
        #$ci = $_REQUEST['ci'];
        $query = "SELECT ci FROM persona WHERE ci='$ci'";
        #$db->query($query);
        $result = $db->query($query);
        if ($result->num_rows > 0) {
          echo 0;
        }
        else {
          echo 1;
        }
      }
      else {
        echo 2;
      }

  }
 ?>
