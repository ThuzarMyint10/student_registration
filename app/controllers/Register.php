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
            $mobile = $_POST['mobile'];
            $address = $_POST['address'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $subject = $_POST['subject'];
            $specialization = $_POST['specialization'];
            $degree = $_POST['degree'];
            $image = $_FILES['image'];

           $register = new RegisterModel();
           $register->setUserId($user_id);
            $register->setSname($sname);
            $register->setFname($fname);
            $register->setMobile($mobile);
           $register->setAddress($address);
           $register->setDateofbirth($date_of_birth);
           $register->setGender($gender);
           $register->setSubject($subject);
           $register->setSpecialization($specialization);
           $register->setDegree($degree);
           $register->setImage($image);

           $registerCreate = $this->db->create('register', $register->toArray());
            setMessage('success', 'Create successful!');
            redirect('pages/dashboard');
        }
     }
}
?>