<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  function testare($ci){
    $db= new mysqli("localhost", "root","","sacramenta");
    #$ci = $_REQUEST['ci'];

    $query = "SELECT ci FROM persona WHERE ci='$ci'";
    $db->query($query);
    if ($db->affected_rows==0) {
      echo "Carnet de identidad disponible";
    }
    else {
      echo "Carnet de identidad ya registrado";
    }
  }
 ?>
