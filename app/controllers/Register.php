<?php

class Register extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('RegisterModel');
        $this->model('AddressModel');
        $this->model('StreetModel');
        $this->model('TownshipModel');
        $this->model('EducationModel');
        $this->model('SemesterModel');
        $this->model('SubjectModel');

        $this->db = new Database();
    }
     public function index()
    {
        $this->view('pages/dashboard');
    }
    
    public function create()
    {
        $student = $this->db->readAll('student');
        $data = [
            'student
            ' => $student
            ];

        $this->view('pages/dashboard', $data);
    }
    
   public function store()
    { 
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            $name = $_POST['name'];
            $email=$_POST['email'];
            $father_name = $_POST['father_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $password='Eek752000@';
            $is_confirmed='1';
            $is_active='1';
            $is_login='0';
            $token='';
            $date='';
            $token_expire='';
            $user_type_id='2';
            $social_id='';

            $city = $_POST['city'];
            $blog = $_POST['blog'];
            $street_name=$_POST['street_name'];
            $street_no=$_POST['street_no'];
            $township_name=$_POST['township_name'];
            $street_id=1;
            $township_id=1;
            $semester_name=$_POST['semester_name'];
            $specialization = $_POST['specialization'];
            $degree = $_POST['degree'];
            $msg = "";
            $img = $_FILES['profile_image']['name'];
            $target = "upload_images/".basename($img);
            if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }

          
           
            $township=new TownshipModel();
            $township->setName($township_name);
            $townshipCreate = $this->db->create('township', $township->toArray());

            $street=new StreetModel();
            $street->setName($street_name);
            $street->setStreetNo($street_no);
            $street->setTownshipId((int)$townshipCreate);
            $streetCreate = $this->db->create('street', $street->toArray());

            $address = new AddressModel();
            $address->setCity($city);
            $address->setBlog($blog);
            $address->setStreetId((int)$streetCreate);
            $addressCreate = $this->db->create('address', $address->toArray());
            
            $education=new EducationModel();
            $education=new SemesterModel();
            $education->setName($semester_name);
            $educationCreate=$this->db->create('semester',$education->toArray());
            $education=new SubjectModel();
            $education->setSpecialization($specialization);
            $education->setDegree($degree);
            $educationCreate=$this->db->create('subject',$education->toArray());
           
           $register = new RegisterModel();
           $register->setName($name);
           $register->setEmail($email);
           $register->setProfileImage($img);
           $register->setFatherName($father_name);
           $register->setDateofbirth($date_of_birth);
           $register->setGender($gender);
           $register->setIsConfirmed($is_confirmed);
           $register->setIsActive($is_active);
           $register->setIsLogin($is_login);
           $register->setToken($token);
           $register->setDate($date);
           $register->setTokenExpire($token_expire);
           $register->setUserTypeId($user_type_id);
           $register->setPassword($password);
           $register->setSocialId($social_id);
           $register->setAddressId((int)$addressCreate);
           $register->setEducationId((int)$educationCreate);
           $register->setProfileImage($img);
           $registerCreate = $this->db->create('student', $register->toArray());
           if( $registerCreate){
            setMessage('success', 'Create successful!');
            redirect('pages/dashboard');
        }else{
            echo "Not success";
        }
        }
     }
      
    public function edit($id)
    {
        $register = $this->db->readAll('register');

        $register = $this->db->getById('register', $id);

        $data = [
            'register'    => $register
        ];
        $this->view('pages/dashboard', $data);
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            $id = $_POST['id'];
            $sname = $_POST['sname'];
            $fname = $_POST['fname'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $blog= $_POST['blog'];
            $street = $_POST['street'];
            $township = $_POST['township'];
            $city = $_POST['city'];
            $date_of_birth = $_POST['date_of_birth'];
            $semester = $_POST['semester'];
            $specialization = $_POST['specialization'];
            $degree = $_POST['degree'];
            $user_id =base64_decode($_SESSION['id']);
            $newImg = $_FILES['image']['name'];
            $target = "upload_images/".basename($newImg);
            if (!empty(move_uploaded_file($_FILES['image']['tmp_name'], $target))) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }
            $address = new AddressModel();
            $address->setId($id);
            $address->setBlog($blog);
            $address->setStreet($street);
            $address->setTownship($township);
            $address->setCity($city);
            $addressCreate = $this->db->update('addresses', $address->getId( ), $address->toArray());
           
            $education=new EducationModel();
            $education->setId($id);
            $education->setSemester($semester);
            $education->setSpecialization($specialization);
            $education->setDegree($degree);
            $educationCreate=$this->db->update('education', $education->getId( ), $education->toArray());
           

            $register = new RegisterModel();
            $register->setId($id);
            $register->setSname($sname);
            $register->setFname($fname);
            $register->setEmail($email);
            $register->setDateofbirth($date_of_birth);
            $register->setAddressId((int)$addressCreate);
            $register->setEducationId((int)$educationCreate);
            $register->setGender($gender);
            if(empty($newImg))
            {
                $edit_query = $this->db->getById('register', $id);
                $newImg = $edit_query['image'];
            }
            $register->setImage($newImg);
            $register->setUserId($user_id);
            $updated = $this->db->update('register', $register->getId( ), $register->toArray());
            if($updated){
            echo "<script>
            alert('Success! Data has been successfully updated!');
            </script>";
            }else{
                echo "Data not update";
            }
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
    public function export(){
       $run_datas = $this->db->readAll('register');
       $timestamp = time();
        $filename = 'Export_excel_' . $timestamp . '.xls';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        
        $isPrintHeader = false;
        foreach ($run_datas as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
        exit();
    }
}
?>