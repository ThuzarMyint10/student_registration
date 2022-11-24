<?php

class RegisterModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $user_id;
    private $sname;
    private $fname;
    private $mobile;
    private $address;
    private $date_of_birth;
    private $gender;
    private $subject;
    private $specialization;
    private $degree;
    private $image;

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function getUserId()
    {
        return $this->user_id;
    }

    public function setSname($sname)
    {
        $this->sname = $sname;
    }
    public function getSname()
    {
        return $this->sname;
    }

    public function setFname($fname)
    {
        $this->fname = $fname;
    }
    public function getFname()
    {
        return $this->fname;
    }

    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }
    public function getMobile()
    {
        return $this->mobile;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setDateofbirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }
    public function getDateofbirth()
    {
        return $this->date_of_birth;
    }

    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    public function getGender()
    {
        return $this->gender;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }
    public function getSubject()
    {
        return $this->subject;
    }
    public function setSpecialization($specialization)
    {
        $this->specialization = $specialization;
    }
    public function getSpecialization()
    {
        return $this->specialization;
    }
     public function setDegree($degree)
    {
        $this->degree = $degree;
    }
    public function getDegree()
    {
        return $this->degree;
    }
     public function setImage($image)
    {
        $this->image= $image;
    }
    public function getImage()
    {
        return $this->image;
    }

    public function toArray() {
        return [
            "id" => $this->getId(),
            "user_id" => $this->getUserId(),
            "fname" => $this->getSname(),
            "lname" => $this->getFname(),
            "mobile" => $this->getMobile(),
            "address" => $this->getAddress(),
            "date_of_birth" => $this->getDateofbirth(),
            "gender" => $this->getGender(),
            "subject" => $this->getSubject(),
            "specialization" => $this->getSpecialization(),
            "degree" => $this->getDegree(),
            "image" => $this->getImage()
        ];
    }
}