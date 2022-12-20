<?php
class AddressModel {
    private $id;
    private $block;
    private $unit;
    private $street_id;
    private $township_id;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setBlock($block)
    {
        $this->block=$block;
    }
    public function getBlock()
    {
        return $this->block;
    }
     public function setUnit($unit)
    {
        $this->unit = $unit;
    }
    public function getUnit()
    {
        return $this->unit;
    }
    public function setStreetId($street_id)
    {
        $this->street_id=$street_id;
    }
    public function getStreetId()
    {
        return $this->street_id;
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
            "block" => $this->getBlock(),
            "unit" => $this->getUnit(),
            "street_id"=>$this->getStreetId(),
            "township_id"=>$this->getTownshipId()
        ];
    }
}
?>