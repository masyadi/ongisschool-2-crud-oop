<?php
if(!defined('RESTRICTED'))exit('No direct script access allowed!');

require 'config/database.php';

class Crud extends Database
{
  private $error;

  function __construct()
  {
    parent::__construct();
  }

  public function view($tableName, $where, $order = '')
  {
    $statement = null;
    if(!empty($where))
    {
      $split = explode('=', $where);
      if(empty($order))
      {
        $statement = $this->db->prepare('SELECT * FROM '. $tableName .' WHERE '. $split[0] .'=:'. $split[0]);
      } else {
        $statement = $this->db->prepare('SELECT * FROM '. $tableName .' WHERE '. $split[0] .'=:'. $split[0] .' ORDER BY '. $order);
      }

      $param = array(
        ''. $split[0] .'' => $split[1]
      );
      $statement->execute($param);
      return $statement->fetch(PDO::FETCH_OBJ);

    } else {
      if(empty($order))
      {
        $statement = $this->db->prepare('SELECT * FROM '. $tableName);
      } else {
        $statement = $this->db->prepare('SELECT * FROM '. $tableName .' ORDER BY '. $order);
      }
      $statement->execute();
      return $statement->fetchAll(PDO::FETCH_OBJ);
    }
  }

  public function create($tableName, $field)
  {
    $fieldsStr = null;
    $fields = null;
    $param = array();

    foreach ($field as $key => $value) {
      $fieldsStr = $fieldsStr .", ". $key;
    }

    foreach ($field as $key => $value) {
      //$fields .= ", ". $key. "=:". $key;
      $fields .= ", ". ":". $key;
    }

    foreach ($field as $key => $value) {
      $param[':'. $key] = $value;
    }

    //delete character (,)
    $fieldsStr  = substr($fieldsStr, 1);
    $fields     = substr($fields, 1);

    $respond = null;
    try {
      $statement = $this->db->prepare("INSERT INTO ". $tableName ." (". $fieldsStr .") VALUES (". $fields .")");
  		$statement->execute($param);
      $respond = 1;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      $respond = 0;
    }
    return $respond;
  }

  public function createMulty($tableName, $field)
  {
     $this->db->beginTransaction();
    $fieldsStr = null;
    $fields = null;
    $param = array();

    foreach ($field as $key => $value) {
      $fieldsStr = $fieldsStr .", ". $key;
    }

    foreach ($field as $key => $value) {
      //$fields .= ", ". $key. "=:". $key;
      $fields .= ", ". ":". $key;
    }

    foreach ($field as $key => $value) {
      $param[':'. $key] = $value;
    }

    //delete character (,)
    $fieldsStr  = substr($fieldsStr, 1);
    $fields     = substr($fields, 1);

    $respond = null;
    try {
      $statement = $this->db->prepare("INSERT INTO ". $tableName ." (". $fieldsStr .") VALUES (". $fields .")");
  		$statement->execute($param);
      $respond = 1;
    } catch (PDOException $e) {
      $this->error = $e->getMessage();
      $respond = 0;
    }
    $this->db->commit();
    return $respond;
  }

  public function update($tableName, $field, $where)
  {
    $fields = null;
    $wheres = null;
    foreach ($field as $key => $value) {
      $fields .= ", ". $key. "=:". $key;
    }
    foreach ($where as $key => $value) {
      $wheres .= ",". $key. "=:". $key;
    }
    //delete character (,)
    $fields = substr($fields, 1);
    $wheres = substr($wheres, 1);

    //group in array
    $param = array_merge($field, $where);

    $return = null;
    try {
      $statement = $this->db->prepare("UPDATE ". $tableName ." SET ". $fields ." WHERE ". $wheres);
      $statement->execute($param);
      $return = 1;
    } catch (Exception $e) {
      $this->error = $e->getMessage();
      $return = 0;
    }
    return $return;
  }

  public function delete($tableName, $where)
  {
    $wheres = null;
    foreach ($where as $key => $value) {
      $wheres .= ",". $key. "=:". $key;
    }
    $wheres = substr($wheres, 1);

    $respond = null;
    try {
      $statement = $this->db->prepare('DELETE FROM '. $tableName .' WHERE '. $wheres);
    	$statement->execute($where);
      $respond = 1;
    } catch (Exception $e) {
      $respond = 0;
      $this->error = $e->getMessage();
    }
    return $respond;
  }

  public function getError()
  {
    return $this->error;
  }
}

// $c = new Crud();
// $field = array(
//   'title'       => 'hello 2',
//
// );
// $id = array(
//   'i' => 24
// );
// $c->update('articles', $field, $id);
?>
