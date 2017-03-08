<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
  }
  function checkLogin($email, $password)
  {
    $this->db->select('tipoUsuario');
    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $consult = $this->db->get('users');
      if ($consult->num_rows() > 0) {
        foreach ($consult->result() as $row)
        {
            $row->tipoUsuario;
        }
          if ($row->tipoUsuario == 'administrador' || $row->tipoUsuario == 'fiel') {
              $this->db->select('*');
              $this->db->from('users');
              $this->db->join('cuenta', 'cuenta.idCuenta = users.cuenta_id');
              $this->db->where('users.email', $email);
              $query = $this->db->get()->row();
              if (count($query) > 0) {
                #  if ($query->nombres != null) {
                    $usuario = array('nombre' => $query->nombres, 'id' => $query->idCuenta,'apellidos' => $query->apellidoPaterno.' '.$query->apellidoMaterno, 'tipo' => $query->tipoUsuario);
                    $this->session->set_userdata($usuario);
                #  }
              }
              #print_r($usuario);
        }
        else {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->join('parroquia', 'parroquia.idParroquia = users.parroquia_id');
            $this->db->where('users.email', $email);
            $query = $this->db->get()->row();
                if (count($query) > 0) {
                    $usuario = array('nombre' => $query->nombre, 'id'=>$query->idParroquia, 'direccion'=> $query->direccion, 'tipo' => $query->tipoUsuario);
                    $this->session->set_userdata($usuario);
                }
          #    print_r($usuario);
        }
        return true;
      }
      else
      {
        return false;
      }
  }
  function personRegister($table, $data){
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
  }
  function registerWithId($table, $data)
  {
      $this->db->insert($table,$data);
      if ($this->db->affected_rows() == '1') {
           $insert_id = $this->db->insert_id();
           return $insert_id;
      }
      else {
          return false;
      }
  }
  function getID($ci)
  {
        $query = $this->db->get_where('cuenta',array('ci' => $ci));
        if($query->num_rows() > 0 )
        {
            //veamos que sólo retornamos una fila con row(), no result()
            return $query->row();
        }
  }

  function usersRegister($table, $data)
  {
    $this->db->insert($table, $data);
    if ($this->db->affected_rows() == '1') {
      return TRUE;
    }
    return FALSE;
  }

  function edit($a) {
    $d = $this->db->query("SELECT a.*, b.*, c.*, d.* FROM persona a, sacerdote b, tipoSacerdote c, users d
                            WHERE a.id = $a
                            AND b.tipoSacerdote_id = c.idTipoSacerdote
                            AND a.id = d.persona_id");
    if ($d->num_rows() > 0) {
        return $d->row();
    }
    else{
      return false;
    }
  }

  function editFiel($uri) {

      $this->db->select('*');
      $this->db->from('persona'); 
      $this->db->join('certificado', 'certificado.persona_id = persona.id');
      $this->db->join('padresfiel c', 'c.persona_id=persona.id');
      $this->db->where('persona.id',$uri);       
      return $this->db->get()->row(); 
      
  }

  function editUser($uri) {
      $this->db->select('*');
      $this->db->from('users');
      $this->db->join('cuenta', 'cuenta.idCuenta = users.cuenta_id');
      $this->db->where('users.id', $uri);
      return $this->db->get()->row();
  }

  function update_user($id) {

    $id = $this->input->post('id');
    $apellidoPaterno = $this->input->post('apellidoPaterno');
    $apellidoMaterno = $this->input->post('apellidoMaterno');
    $nombres = $this->input->post('nombres');
    $ci = $this->input->post('ci');
    $fechaNacimiento = $this->input->post('fechanac');
    $celular = $this->input->post('celular');
    $facebook = $this->input->post('facebook');
    $genero = $this->input->post('genero');
    $idCuenta = $this->input->post('idCuenta');
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $tipoUsuario = $this->input->post('tipoUsuario');

    $data1 = array(
      'email' => $email,
      'password' => $password,
      'tipoUsuario' => $tipoUsuario
    );
    $this->db->where('id', $id);
    $this->db->update('users', $data1);

    $data = array(
      'apellidoPaterno' => $apellidoPaterno,
      'apellidoMaterno' => $apellidoMaterno,
      'nombres' => $nombres,
      'ci' => $ci,
      'fechaNacimiento' => $fechaNacimiento,
      'celular' => $celular,
      'facebook' => $facebook,
      'genero' => $genero
    );
    $this->db->where('idCuenta', $id);
    $this->db->update('cuenta', $data);
    

  }

  function delete_user($a) {
    $this->db->delete('users', array('id' => $a));
    return;
  }

  function update($id) {
    $id = $this->input->post('id');
    $ci = $this->input->post('ci');
    $nombre = $this->input->post('nombre');
    $apellido = $this->input->post('apellido');
    $fechanacimiento = $this->input->post('fechanacimiento');
    //$parroquia = $this->input->post('parroquia');
    $tipoSacerdote = $this->input->post('tipoSacerdote');
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $data1 = array(
      'ci' => $ci,
      'fechanacimiento' => $fechanacimiento,
      'nombre' => $nombre,
      'apellido' => $apellido,
      //'parroquia' => $parroquia,
      //'tipoSacerdote_id' => $tipoSacerdote,
    );
    $this->db->where('id', $id);
    $this->db->update('persona',$data1);
    $data2 = array(
      'email' => $email,
      'password' => $password

    );
    $this->db->where('id', $id);
    $this->db->update('users',$data2);
  }

  function autoCompleteCarnetPadre($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','1');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetMadre($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','2');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetPadrino($data)
  {
    $this->db->select('*');
    $this->db->limit(5);
    $this->db->like('ci',$data);
    $this->db->where('genero_id','1');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }
  function autoCompleteCarnetCommunion($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c WHERE a.ci = '$data' AND c.sacramento = 'bautizo' AND a.id = b.persona_id AND b.sacramento_id = c.idSacramento");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'], 'apellido'=>$row['apellido'],'fechanac'=>$row['fechanacimiento']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Carnet de identidad no valido');
      echo json_encode($row_set);
    }

  }

  function autoCompleteCarnetConfirmacion($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c WHERE a.ci = '$data' AND c.idSacramento = '2' AND a.id = b.persona_id AND b.sacramento_id = c.idSacramento");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'], 'apellido'=>$row['apellido'],'fechanac'=>$row['fechanacimiento']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Carnet de identidad no valido');
      echo json_encode($row_set);
    }

  }

  function autoCompleteEsposo($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c
                            WHERE c.idSacramento = '3'
                            AND a.genero = 'masculino'
                            AND a.id = b.persona_id
                            AND b.sacramento_id = c.idSacramento
                            AND (a.nombres LIKE '%$data%' OR a.apellidoPaterno LIKE '%$data%' OR a.apellidoMaterno LIKE '%$data%')
                            GROUP BY a.nombres  LIMIT 5");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Nombre: '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'].' '.$row['nombres'],'id'=>$row['id'], 'ci'=>$row['ci']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Nombre no encontrado');
      echo json_encode($row_set);
    }
  }

  function autoCompleteFeligresConfirmacion($q)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c
                            WHERE c.idSacramento = '2'
                            AND a.id = b.persona_id
                            AND b.sacramento_id = c.idSacramento
                            AND (a.nombres LIKE '%$q%' OR a.apellidoPaterno LIKE '%$q%' OR a.apellidoMaterno LIKE '%$q%')
                            GROUP BY a.nombres  LIMIT 5");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Nombre: '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'].' '.$row['nombres'],'id'=>$row['id'], 'ci'=>$row['ci']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Nombre no encontrado');
      echo json_encode($row_set);
    }
  }

  function autoCompleteEsposa($data)
  {
    $query = $this->db->query("SELECT * FROM persona a, certificado b, sacramento c
                               WHERE c.idSacramento = '3'
                               AND a.genero = 'femenino'
                               AND a.id = b.persona_id
                               AND b.sacramento_id = c.idSacramento
                               AND (a.nombres LIKE '%$data%' OR a.apellidoPaterno LIKE '%$data%' OR a.apellidoMaterno LIKE '%$data%')
                               GROUP BY a.nombres  LIMIT 5");
    if ($query->num_rows() > 0 ) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Nombre: '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'].' '.$row['nombres'],'id'=>$row['id'], 'ci'=>$row['ci']);
      }
      echo json_encode($row_set);
    }
    else {
      $row_set[] = array('label'=>'Nombre no encontrado');
      echo json_encode($row_set);
    }

  }

    function count($table)
    {
        $query = $this->db->query("SELECT count(id), a.nombres, a.apellidoPaterno, a.apellidoMaterno FROM $table, persona a ");
        return $query = $this->db->get();
    }
    function count_user($table)
    {
        $query = $this->db->query("SELECT count(id), a.nombres, a.apellidoPaterno, a.apellidoMaterno FROM $table, cuenta a ");
        return $query = $this->db->get();
    }
    function count_administrador($table, $sacramento)
    {
        $query = $this->db->query("SELECT count(idCertificado) FROM $table WHERE sacramento_id = $sacramento");
        return $query = $this->db->get();
    }
    function count_parroquia($table, $idParroquia)
    {
      $query = $this->db->query("SELECT count(idCertificado) FROM $table WHERE parroquia_id = $idParroquia");
      return $query = $this->db->get();
  }
  function count_persona($table)
    {
      $query = $this->db->query("SELECT count(id) FROM $table");
      return $query = $this->db->get();
  }
  function listGetSacerdote($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array')
    {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('idSacerdote','asc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }
    function listGetUser($table,$fields,$where='',$perpage=0,$start=0,$one=false,$array='array')
    {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by('id','asc');
        $this->db->limit($perpage,$start);
        if($where){
            $this->db->where($where);
        }
        $query = $this->db->get();
        $result =  !$one  ? $query->result() : $query->row();
        return $result;
    }


    function autoCompleteFeligres($data)
    {
      $this->db->select('*');
      $this->db->limit(5);
      $this->db->like('nombres',$data);
      $this->db->or_like('apellidoPaterno',$data);
      $this->db->or_like('apellidoMaterno',$data);
      $query = $this->db->get('persona');
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row){

            $row_set[] = array('label'=>'Feligres: '.$row['nombres'].' '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'],'id'=>$row['id'], 'nombres'=>$row['nombres'].' '.$row['apellidoPaterno']);
        }
        echo json_encode($row_set);
      }
    }
    function autoCompleteSacerdoteCelebrante($data)
    {
      $query = $this->db->query("SELECT l.*, g.idSacerdote FROM persona l, sacerdote g WHERE l.id = g.persona_id AND (l.nombres LIKE '%$data%' OR l.apellidoPaterno LIKE '%$data%' OR l.apellidoMaterno LIKE '%$data%') LIMIT 5");
      if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row){
            $row_set[] = array('label'=>'Sacerdote: '.$row['nombres'].' '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'],'id'=>$row['idSacerdote'], 'nombres'=>$row['nombres'].' '.$row['apellidoPaterno']);
        }
        echo json_encode($row_set);
      }
    }
    function getFaithful($texto){
        $query = $this->db->query("SELECT a.*, b.* FROM persona a, certificado b WHERE a.id = b.persona_id AND (a.nombres LIKE '%$texto%' OR a.apellidoPaterno LIKE '%$texto%' OR a.apellidoMaterno LIKE '%$texto%') GROUP BY a.id LIMIT 10");
        if ($query->num_rows() > 0) {
        foreach ($query->result_array() as $row){
            #BUSCA EL REGISTRO DE BAUTIZO
            #$idPersona = $row['persona_id'];
            $this->db->select('*');
            $this->db->from('certificado');
            $this->db->join('persona', 'persona.id = certificado.persona_id');
            $this->db->where('persona.id', $row['persona_id']);
            $this->db->where('sacramento_id', '1');
            $this->db->group_by('certificado.persona_id');
            $query = $this->db->get()->row();
            if (count($query) > 0) {
                  #$idBaptism = $query->idCertificado;
              $idBaptism = '<i class="mdi-action-done"></i>';
            }
            else
            {
              $idBaptism = '<i class="mdi-navigation-close"></i>';
            }
            $this->db->select('*');
            $this->db->from('certificado');
            $this->db->join('persona', 'persona.id = certificado.persona_id');
            $this->db->where('persona.id', $row['persona_id']);
            $this->db->where('sacramento_id', '2');
            $this->db->group_by('certificado.persona_id');
            $query = $this->db->get()->row();
            if (count($query) > 0) {
                 # $idCommunion = $query->idCertificado;
              $idCommunion = '<i class="mdi-action-done"></i>';
            }
            else
            {
              $idCommunion = '<i class="mdi-navigation-close"></i>';
            }
            $this->db->select('*');
            $this->db->from('certificado');
            $this->db->join('persona', 'persona.id = certificado.persona_id');
            $this->db->where('persona.id', $row['persona_id']);
            $this->db->where('sacramento_id', '3');
            $this->db->group_by('certificado.persona_id');
            $query = $this->db->get()->row();
            if (count($query) > 0) {
                 # $idConfirm = $query->idCertificado;
              $idConfirm = '<i class="mdi-action-done"></i>';
            }
            else
            {
              $idConfirm ='<i class="mdi-navigation-close"></i>';
            }
            $this->db->select('*');
            $this->db->from('certificado');
            $this->db->join('persona', 'persona.id = certificado.persona_id');
            $this->db->where('persona.id', $row['persona_id']);
            $this->db->where('sacramento_id', '4');
            $this->db->group_by('certificado.persona_id');
            $query = $this->db->get()->row();
            if (count($query) > 0) {
                 #$idMarriage = $query->idCertificado;
              $idMarriage = '<i class="mdi-action-done"></i>';
            }else{
              $idMarriage = '<i class="mdi-navigation-close"></i>';
            }
            $row_set[] = array('label'=>'Fiel: '.$row['nombres'].' '.$row['apellidoPaterno'].' '.$row['apellidoMaterno'],'idPersona'=>$row['persona_id'],'idCertificado'=>$row['idCertificado'], 'nombres'=>$row['nombres'],'apellidoPaterno'=> $row['apellidoPaterno'], 'apellidoMaterno'=>$row['apellidoMaterno'], 'fechanacimiento'=>$row['fechanacimiento'], 'baptism' => $idBaptism,'communion'=>$idCommunion, 'confirm'=>$idConfirm,'marriage'=>$idMarriage);
        }
        return $row_set;
      }
    }


}
