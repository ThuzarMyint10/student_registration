<?php
class TownshipModel {
    private $id;
    private $name;
    private $city_id;
   
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setCityId($city_id)
    {
        $this->city_id = $city_id;
    }
    public function getCityId()
    {
        return $this->city_id;
    }
    
    public function toArray() {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "city_id" => $this->getCityId()
        ];
    }
}
?>