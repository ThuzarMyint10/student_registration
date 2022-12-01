<?php

class Register extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('RegisterModel');

        $this->db = new Database();
    }
     public function index()
    {
        $this->view('pages/dashboard');
    }
     public function registerData() {
        $register = $this->db->readAll('register');
        $json = array('data' => $register);
        echo json_encode($json);
    }
    public function create()
    {
        $user = $this->db->readAll('users');
        $data = [
            'users
            ' => $user
            ];

        $this->view('pages/dashboard', $data);
    }
    
   public function store()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            $user_id = base64_decode($_SESSION['id']);
            $sname = $_POST['sname'];
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $subject = $_POST['subject'];
            $specialization = $_POST['specialization'];
            $degree = $_POST['degree'];
            $msg = "";
            $img = $_FILES['image']['name'];
            $target = "upload_images/".basename($img);
            // echo $target;
            // die();

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }

           $register = new RegisterModel();
           $register->setUserId($user_id);
            $register->setSname($sname);
            $register->setFname($fname);
            $register->setEmail($email);
           $register->setAddress($address);
           $register->setDateofbirth($date_of_birth);
           $register->setGender($gender);
           $register->setSubject($subject);
           $register->setSpecialization($specialization);
           $register->setDegree($degree);
           $register->setImage($img);
           
           $registerCreate = $this->db->create('register', $register->toArray());
            setMessage('success', 'Create successful!');
            redirect('pages/dashboard');
        }
     }
      public function edit($id)
    {
        $register = $this->db->getById('register', $id);

        $data = [
            'register'    => $register
        ];
        $this->view('pages/dashboard', $data);
    }

    public function update()        {
     
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            $id= base64_decode($_SESSION['id']);
            $sname = $_POST['sname'];
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $subject = $_POST['subject'];
            $specialization = $_POST['specialization'];
            $degree = $_POST['degree'];
            $msg = "";
            $img = $_FILES['image']['name'];
            $target = "upload_images/".basename($img);
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
           
            $register = new RegisterModel();
            $register->setId($id);
            $register->setSname($sname);
            $register->setFname($fname);
            $register->setEmail($email);
            $register->setAddress($address);
            $register->setDateofbirth($date_of_birth);
            $register->setGender($gender);
            $register->setSubject($subject);
            $register->setSpecialization($specialization);
            $register->setDegree($degree);
            $register->setImage($img);
            
            $updated = $this->db->update('register', $register->getId(), $register->toArray());
            setMessage('success', 'Create successful!');
            redirect('pages/dashboard');  
        }
    }
     public function destroy()
    {
        $id = $_GET['id'];
        $isdestroy = $this->db->delete('register', $id);
        if ($isdestroy) {
            setMessage('success', "Successfully Deleted!");
        } else {
            setMessage('error', "Delete Fail!");
        }
        setMessage('success', " Data has been Deleted");
        redirect('pages/dashboard');
    }

     }
?>