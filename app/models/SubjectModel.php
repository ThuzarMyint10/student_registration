<?php

class SubjectModel{

    private $id;
    private $specialization;
    private $degree;

    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setSpecialization($specialization){
        $this->specialization = $specialization;
    }
    public function getSpecialization(){
        return $this->specialization;
    }

    public function setDegree($degree){
        $this->degree = $degree;
    }
    public function getDegree(){
        return $this->degree;
    }

    public function toArray(){
        return [
            "id"=>$this->getId(),
            "name"=>$this->getName(),
            "degree"=>$this->getDegree(),
        ];
    }
}
?>