<?php

require_once 'database.php';

class Properties{
    //Attributes

    public $id;
    public $property_name;
    public $landlord_id;
    public $region;
    public $provinces;
    public $city;
    public $barangay;
    public $street;
    public $property_description;
    public $features_description;
    public $features;
    public $image_path;
   
    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }
    function fetch($id=0){
        $sql = "SELECT * FROM properties WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $id);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }

    function show(){
        $sql = "SELECT * FROM properties;";
        $query=$this->db->connect()->prepare($sql);
        if($query->execute()){
            $data = $query->fetchAll();
        }
        return $data;
    }
    function properties_fetch($record_id){
        $sql = "SELECT * FROM properties WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            $data = $query->fetch();
        }
        return $data;
    }


    function properties_add() {
        // attempt insert query execution
        $sql = "INSERT INTO properties (property_name, landlord_id, region, provinces, city, barangay, street, property_description, features_description, features, image_path) 
        VALUES (:property_name, :landlord_id, :region, :provinces, :city, :barangay, :street, :property_description, :features_description, :features, :image_path)";
    
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':property_name', $this->property_name);
        $query->bindParam(':landlord_id', $this->landlord_id);
        $query->bindParam(':region', $this->region);        
        $query->bindParam(':provinces', $this->provinces);
        $query->bindParam(':city', $this->city);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':street', $this->street);
        $query->bindParam(':property_description', $this->property_description);
        $query->bindParam(':features_description', $this->features_description);
        $features_json = json_encode($this->features);
        $query->bindParam(':features', $features_json);
        $query->bindParam(':image_path', $this->image_path);

        if($query->execute()){
            return true;
        }
        else{
            return false;
        }	
    }

    function properties_edit() {
        // attempt insert query execution
        $sql = "UPDATE properties SET property_name=:property_name, landlord_id=:landlord_id, region=:region, provinces=:provinces, city=:city, barangay=:barangay, street=:street, property_description=:property_description, features_description=:features_description, features=:features, image_path=:image_path WHERE id=:id;";
        
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':property_name', $this->property_name);
        $query->bindParam(':landlord_id', $this->landlord_id);
        $query->bindParam(':address', $this->address);
        $query->bindParam(':region', $this->region);        
        $query->bindParam(':provinces', $this->provinces);
        $query->bindParam(':city', $this->city);
        $query->bindParam(':barangay', $this->barangay);
        $query->bindParam(':street', $this->street);
        $query->bindParam(':property_description', $this->property_description);
        $query->bindParam(':features_description', $this->features_description);
        $features_json = json_encode($this->features);
        $query->bindParam(':features', $features_json);
        $query->bindParam(':image_path', $this->image_path);
        $query->bindParam(':id', $this->id);
    
            if($query->execute()){
                return true;
            }
            else{
                return false;
            }	
    }
    function properties_delete($record_id){
        $sql = "DELETE FROM properties WHERE id = :id;";
        $query=$this->db->connect()->prepare($sql);
        $query->bindParam(':id', $record_id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
      }

}

?>