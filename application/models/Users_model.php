<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    $this->tableName = 'faithfuluser';
		$this->primaryKey = 'id';
  }

  # Verificamos si un usuario esta registrado en el sistema
  public function checkUser($data = array()){
		$this->db->select($this->primaryKey);
		$this->db->from($this->tableName);
		$this->db->where(array('oauth_provider'=>$data['oauth_provider'],'oauth_uid'=>$data['oauth_uid']));
		$prevQuery = $this->db->get();
		$prevCheck = $prevQuery->num_rows();

  		if($prevCheck > 0){
  			$prevResult = $prevQuery->row_array();
  			$data['modified'] = date("Y-m-d H:i:s");
  			$update = $this->db->update($this->tableName,$data,array('id'=>$prevResult['id']));
  			$userID = $prevResult['id'];
  		}
      else{
  			$data['created'] = date("Y-m-d H:i:s");
  			$data['modified'] = date("Y-m-d H:i:s");
  			$insert = $this->db->insert($this->tableName,$data);
  			$userID = $this->db->insert_id();
  		}

		return $userID?$userID:FALSE;
    }
  function checkLogin($email, $password)
  {

    $this->db->where('email', $email);
    $this->db->where('password', $password);
    $consult = $this->db->get('users');
      if ($consult->num_rows()>0) {
        #$dato = array('tipo' => $usuario->tipoUsuario, 'id' => $usuario->idUsuarios,'permissao' => $usuario->permissoes_id , 'logado' => TRUE);
        #$this->session->set_userdata($datos);
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
        $query = $this->db->get_where('persona',array('ci' => $ci));
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




/*$query = $this->db->query(  'SELECT subject
                    FROM items
                    WHERE subject LIKE 'Ma%'
                  UNION ALL
                    SELECT first_name
                    FROM accounts
                    WHERE first_name LIKE 'Ma%'
                  UNION ALL
                    SELECT description
                    FROM items
                    WHERE description LIKE 'Ma%'');*/




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

  /*function autoCompleteEsposa($data)
  {
    $this->db->select('*');
    $this->db->from('persona a');
    $this->db->join('persona a');
    $this->db->join('persona a');
    $this->db->limit(5);
    $this->db->like('nombres',$data);
    $this->db->or_like('apellidoPaterno',$data);
    $this->db->or_like('apellidoMaterno',$data);
    $this->db->where('genero_id','1');
    $this->db->where('persona','id=persona_id');
    $query = $this->db->get('persona');
    if ($query->num_rows() > 0) {
      foreach ($query->result_array() as $row){
          $row_set[] = array('label'=>'Carnet de Identidad: '.$row['ci'],'id'=>$row['id'], 'ci'=>$row['ci'], 'nombre'=>$row['nombre'].' '.$row['apellido']);
      }
      echo json_encode($row_set);
    }
  }*/

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
        return $this->db->count_all($table);
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


}
