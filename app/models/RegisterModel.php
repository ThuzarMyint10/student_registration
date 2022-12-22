<?php

class RegisterModel
{
    // Access Modifier = public, private, protected
    private $id;
    private $name;
    private $email;
    private $password;
    private $profile_image;
    private $is_confirmed;
    private $is_active;
    private $is_login;
    private $token;
    private $date;
    private $token_expire;
    private $user_type_id;
    private $father_name;
    private $date_of_birth;
    private $gender;
    private $address_id;
    // private $social_id;
    private $education_id;
   

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }

    public function setUserTypeId($user_type_id)
    {
        $this->user_type_id = $user_type_id;
    }
    public function getUserTypeId()
    {
        return $this->user_type_id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    
    public function setFatherName($father_name)
    {
        $this->father_name = $father_name;
    }
    public function getFatherName()
    {
        return $this->father_name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function getPassword()
    {
        return $this->password;
    }

    public function setProfileImage($profile_image)
    {
        $this->profile_image = $profile_image;
    }
    public function getProfileImage()
    {
        return $this->profile_image;
    }

    public function setIsConfirmed($is_confirmed)
    {
        $this->is_confirmed = $is_confirmed;
    }
    public function getIsConfirmed()
    {
        return $this->is_confirmed;
    }

    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }
    public function getIsActive()
    {
        return $this->is_active;
    }

    public function setIsLogin($is_login)
    {
        $this->is_login = $is_login;
    }
    public function getIsLogin()
    {
        return $this->is_login;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }
    public function getToken()
    {
        return $this->token;
    }

    public function setTokenExpire($token_expire)
    {
        $this->token_expire = $token_expire;
    }
    public function getTokenExpire()
    {
        return $this->token_expire;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }
    public function getDate()
    {
        return $this->date;
    }

    
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }
    public function getDateOfBirth()
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

    public function setAddressId($address_id)
    {
        $this->address_id= $address_id;
    }
    public function getAddressId()
    {
        return $this->address_id;
    }

    // public function setSocialId($social_id)
    // {
    //     $this->social_id= $social_id;
    // }
    // public function getSocialId()
    // {
    //     return $this->social_id;
    // }

    public function setEducationId($education_id)
    {
        $this->education_id= $education_id;
    }
    public function getEducationId()
    {
        return $this->education_id;
    }

    public function toArray() {
        return [
            "id" => $this->getId(),
            "name" => $this->getName(),
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "profile_image" => $this->getProfileImage(),
            "is_confirmed" => $this->getIsConfirmed(),
            "is_active" => $this->getIsActive(),
            "is_login" => $this->getIsLogin(),
            "token" => $this->getToken(),
            "token_expire" => $this->getTokenExpire(),
            "date" => $this->getDate(),
            "user_type_id" => $this->getUserTypeId(),
            "father_name" => $this->getFatherName(),
            "date_of_birth" => $this->getDateOfBirth(),
            "gender" => $this->getGender(),
            "address_id" => $this->getAddressId(),
            // "social_id" => $this->getSocialId(),
            "education_id" => $this->getEducationId(),
        ];
    }
}