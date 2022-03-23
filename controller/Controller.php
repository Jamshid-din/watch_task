<?php

  require_once 'config.php';
  require './model/Products.php';
  require './model/ProductsModel.php';

  session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

  class Controller{

    function __construct()
    {
      $this->objconfig = new Config();
      $this->objsm = new ProductsModel($this->objconfig);
    }
    
    public function mvcHandler()
    {
      $act = isset($_GET['act']) ? $_GET['act'] : null;
      $id = isset($_GET['id']) ? $_GET['id'] : null;

      switch ($act) {
        
        case 'update':
          $this->update();
          break;

        case 'get_record':

          $id = (isset($_GET['id'])) ? $_GET['id']:null;
          $this->selectRecord($id);
          break;
        
        default:
          $id = (isset($_GET['id'])) ? $_GET['id']:0;
          $this->groupedListlist($id);
          break;
      }
    }

    public function pageRedirect($url)
    {
      header('Location:'.$url);
    }

    public function checkValidation($attr)
    {
      $noerror = true;

      if (empty($attr->val)) {
        $attr->category_msg = "Field is empty"; $noerror=false;
      }

      return $noerror;
    }

    public function update()
    {
      try {

        $attr = new stdClass();
        $attr->id = $_GET['id'];
        $attr->col = $_GET['col'];
        $attr->val = $_GET['val'];

        // Validation
        $chk = $this->checkValidation($attr);
        if ($chk) {
          $res = $this->objsm->updateRecord($attr);
          if ($res) {
            echo json_encode('success');
          } else {
            echo "Something went wrong! Try Again!";
          }
        }
      } catch (Exception $e ) {

        throw $e;
      }
    }

    public function groupedListlist($id = 0)
    {
      $all = $id;
      if ($id == 0 && $all !=='all') {
        $results = $this->objsm->selectRecord(0);
        include "view/index.php";
      } else {
        
        $results = $this->objsm->selectRecord($id);
        $arr = [];
        foreach ($results as $key => $value) {
          array_push($arr,$value);
        }
        echo json_encode($arr);
      }
      

    }

    public function selectRecord($id = 0)
    {
      $result = ($id == 0) ? $this->objsm->selectChildRecord(0):$this->objsm->selectChildRecord($id);
      $arr = [];
      foreach ($result as $key => $value) {
        array_push($arr,$value);
      }
      echo json_encode($arr);
    }
  }

?>