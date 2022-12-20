<?php
class StreetModel {
    private $id;
    private $name;
    private $township_id;

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
    public function setTownshipId($township_id)
    {
        $this->township_id=$township_id;
    }
    public function getTownshipId()
    {
        return $this->township_id;
    }
    public function toArray() {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "township_id"=>$this->getTownshipId()
        ];
    }
}
?>