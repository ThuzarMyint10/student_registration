<?php
class StreetModel {
    private $id;
    private $name;
    private $street_no;
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
    public function setStreetNo($street_no)
    {
        $this->street_no=$street_no;
    }
    public function getStreetNo()
    {
        return $this->street_no;
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
            "street_no" => $this->getStreetNo(),
            "township_id"=>$this->getTownshipId()
        ];
    }
}
?>