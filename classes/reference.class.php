<?php

require_once 'database.php';

class Reference{

    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }
    
    function get_region(){
      $sql = "SELECT * FROM refregion;";
      $query=$this->db->connect()->prepare($sql);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
  }    
    function get_Citys(){
      $sql = "SELECT * FROM refcitymun;";
      $query=$this->db->connect()->prepare($sql);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
  }
  
    function get_provinced(){
      $sql = "SELECT * FROM refprovince;";
      $query=$this->db->connect()->prepare($sql);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
  }
    function get_province($regCode){
      $sql = "SELECT * FROM refprovince WHERE regCode = :regCode ORDER BY provDesc ASC;";
      $query=$this->db->connect()->prepare($sql);
      $query->bindParam(':regCode', $regCode);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
    }
    function get_City($provCode){
      $sql = "SELECT * FROM refcitymun WHERE provCode = :provCode ORDER BY citymunDesc ASC;";
      $query=$this->db->connect()->prepare($sql);
      $query->bindParam(':provCode', $provCode);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
    }
    function get_brgy($citymunCode){
      $sql = "SELECT * FROM refbrgy WHERE citymunCode = :citymunCode ORDER BY brgyDesc ASC;";
      $query=$this->db->connect()->prepare($sql);
      $query->bindParam(':citymunCode', $citymunCode);
      if($query->execute()){
          $data = $query->fetchAll();
      }
      return $data;
    }
  
  
  function get_main_pro(){
    $sql = "SELECT * FROM properties;";
    $query=$this->db->connect()->prepare($sql);
    if($query->execute()){
        $data = $query->fetchAll();
    }
    return $data;
  }
  function get_unit_con(){
    $sql = "SELECT * FROM unit_condition;";
    $query=$this->db->connect()->prepare($sql);
    if($query->execute()){
        $data = $query->fetchAll();
    }
    return $data;
  }
  function get_unit_type(){
    $sql = "SELECT * FROM unit_type;";
    $query=$this->db->connect()->prepare($sql);
    if($query->execute()){
        $data = $query->fetchAll();
    }
    return $data;
  }
  function get_unit_type_picture($unit_condition_id) {
    $sql = "SELECT unit_type_picture FROM unit_condition WHERE id = :id;";
    $query = $this->db->connect()->prepare($sql);
    $query->bindParam(':id', $unit_condition_id);
    if ($query->execute()) {
        $data = $query->fetch();
    }
    return $data['unit_type_picture'];
  }
}