<?php

require_once 'database.php';

class Lease{

  public $id;
  public $p_unit_id;
  public $tenant_id;
  public $sdate;
  public $ndate;
  public $rent;
  public $deposit;
  public $advance;
  public $electricity;
  public $water;
//  public $leasedoc;


    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function add() {
        $sql = "INSERT INTO lease ( p_unit_id, tenant_id, sdate, ndate, rent, deposit, advance, electricity, water) 
        VALUES (:p_unit_id, :tenant_id, :sdate, :ndate, :rent, :deposit, :advance, :electricity, :water )";

      $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':p_unit_id', $this->p_unit_id);
        $query->bindParam(':tenant_id', $this->tenant_id);
        $query->bindParam(':sdate', $this->sdate);
        $query->bindParam(':ndate', $this->ndate);
        $query->bindParam(':rent', $this->rent);
        $query->bindParam(':deposit', $this->deposit);
        $query->bindParam(':advance', $this->advance);
        $query->bindParam(':electricity', $this->electricity);
        $query->bindParam(':water', $this->water);

        if($query->execute()){
          return true;
          }
          else{
             return false;
          }
        }
        function fetch($id=0){
          $sql = "SELECT * FROM lease WHERE id = :id;";
          $query=$this->db->connect()->prepare($sql);
          $query->bindParam(':id', $id);
          if($query->execute()){
              $data = $query->fetchAll();
          }
          return $data;
        }
      function show()
        {
      $sql = "SELECT * FROM lease;";
      $query = $this->db->connect()->prepare($sql);
      if($query->execute()){
        $data = $query->fetchAll();
    }
    return $data;
    }
  }

  function delete($record_id){
    $sql = "DELETE FROM lease WHERE id = :id;";
    $query=$this->db->connect()->prepare($sql);
    $query->bindParam(':id', $record_id);
    if($query->execute()){
        return true;
    }
    else{
        return false;
    }
}


?>