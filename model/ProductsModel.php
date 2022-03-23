<?php

class productsModel
{
  // set database config for mysql  
  function __construct($consetup)
  {
    $this->host = $consetup->host;
    $this->user = $consetup->user;
    $this->pass =  $consetup->pass;
    $this->db   = $consetup->db;
  }  
  // open mysql data base
  public function open_db()
  {
    $this->condb = new mysqli($this->host,$this->user,$this->pass,$this->db);
    if ($this->condb->connect_error)
    {
      die("Erron in connection: " . $this->condb->connect_error);
    }
  }
  // close database  
  public function close_db()
  {
    $this->condb->close();
  }
 
  //update record
  public function updateRecord($obj)
  {
    try
    {
      $this->open_db();
      $query=$this->condb->prepare("UPDATE products SET $obj->col=? WHERE id=?");  
      $query->bind_param("si", $obj->val,$obj->id);
      $query->execute();
      $res=$query->get_result();
      $query->close();
      $this->close_db();
      return true;
    }
    catch (Exception $e)
    {
      $this->close_db();
      throw $e;
    }
  }
 
  public function selectRecord($id)
  {
    try
    {
      $this->open_db();

      if($id > 0) {
        $query=$this->condb->prepare("SELECT * FROM products WHERE pid=? AND model_number!=0");  
        $query->bind_param("i",$id);
        $query->execute();
        $res=$query->get_result();

        // $arr = [];
        // foreach ($res as $key => $value) {
        //   array_push($arr,$value);
        // }
  
        // print_r($arr);

      } else {
        $query=$this->condb->prepare("SELECT * FROM products WHERE model_number!=0");
        $query->execute();
        $res=$query->get_result();
      }


      $query->close();
      $this->close_db();
      return $res;
    }  
    catch(Exception $e)
    {
      $this->close_db();
      throw $e;
    }

  }

  public function selectChildRecord($id)
  {
    try
    {
      $this->open_db();

      $query=$this->condb->prepare("SELECT * FROM products WHERE id=?");  
      $query->bind_param("i",$id);



      $query->execute();  
      $res=$query->get_result();
      $query->close();
      $this->close_db();

      return $res;
    }  
    catch(Exception $e)
    {
      $this->close_db();
      throw $e;
    }

  }

}
  
?>