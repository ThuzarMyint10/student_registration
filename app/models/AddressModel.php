<?php
class AddressModel {
    private $id;
    private $city;
    private $blog;
    private $street_id;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }
    public function getCity()
    {
        return $this->city;
    }
    public function setBlog($blog)
    {
        $this->blog=$blog;
    }
    public function getBlog()
    {
        return $this->blog;
    }
    public function setStreetId($street_id)
    {
        $this->street_id=$street_id;
    }
    public function getStreetId()
    {
        return $this->street_id;
    }
    public function toArray() {
        return [
            "id" => $this->getId(),
            "city" => $this->getCity(),
            "blog" => $this->getBlog(),
            "street_id"=>$this->getStreetId()
        ];
    }
}
?>