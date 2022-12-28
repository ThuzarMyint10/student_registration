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
            $student = $this->db->readAllByLimit('student');
            $image_store_id = $student[0]['id']+1;
            // for student
            $name = $_POST['student_name'];
            $email=$_POST['email'];
            $password=base64_encode($_POST['password']);
            $father_name = $_POST['father_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $is_confirmed='1';
            $is_active='1';
            $is_login='0';
            $token='';
            $date='';
            $token_expire='';
            $user_type_id='4';

            //for address
            $city_id = $_POST['city'];
            $township_id = $_POST['township'];
            $street_id=$_POST['street_name'];
            $block = $_POST['block'];
            $unit = $_POST['unit'];
           
            // for education
            if(!empty($_POST['semester'])){
                $semester_id=$_POST['semester'];
            }else{
                $semester_id= 0;
            }
            $subject_id = $_POST['specialization'];
            $achedamic_year_id = $_POST['achedamic'];
            $status_id = 1;

            $isUserExist = $this->db->columnFilter('student', 'email', $email);
            if ($isUserExist) {           
                setMessage('error','This user is already exist! You can not create.');
                redirect('pages/dashboard');
            } else {
            $address = new AddressModel();
            $address->setId("");
            $address->setBlock($block);
            $address->setUnit($unit);
            $address->setStreetId($street_id);
            $address->setTownshipId($township_id);
            $isAddressExist = $this->db->getAddressId('address', $unit, $block, $street_id);
            if($isAddressExist){
               $addressId = $isAddressExist['id'];
            } else{
                $addressCreate = $this->db->create('address', $address->toArray());
                $addressId = (int)$addressCreate;
            }
           
            
            $education=new EducationModel();
            $education->setId("");
            $education->setSemesterId($semester_id);
            $education->setSubjectId($subject_id);
            $education->setAchedamicYearId($achedamic_year_id);
            $isEducationIdExist = $this->db->getEducationId('education',$subject_id,$semester_id,$achedamic_year_id);
            if($isEducationIdExist){
                $educationId = $isEducationIdExist['id'];
            }else{
                $educationCreate=$this->db->create('education',$education->toArray());
                $educationId = (int)$educationCreate;
            }
            
           
           $register = new RegisterModel();

            // for image upload
            $msg = "";
            // $img = $_FILES['profile_image']['name'];
           
                $milliseconds = round(microtime(true) * 1000);
                $image['name'] = $milliseconds . $_FILES['profile_image']['name'];
                $target_dir = "upload_images/$image_store_id/";
                $target_file = $target_dir . basename($image['name']);
            if (is_dir("upload_images/$image_store_id/")) {
                $mydir = "upload_images/$image_store_id/"; 
                $myfiles = array_diff(scandir($mydir), array('.', '..'));
                foreach($myfiles as $myfile) {
                    unlink("upload_images/$image_store_id/".$myfile); 
                }
            
                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                    $msg = "Image uploaded successfully";
                    $register->setProfileImage($image['name']);
                }else{
                    $msg = "Failed to upload image";
                }
           
            } else{
                mkdir("upload_images/$image_store_id/");
                if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file)) {
                    $msg = "Image uploaded successfully";
                    $register->setProfileImage($image['name']);
                }else{
                    $msg = "Failed to upload image";
                }
            }
            // end of image upload
           $register->setId("");
           $register->setName($name);
           $register->setEmail($email);
           $register->setPassword($password);
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
           $register->setAddressId($addressId);
           $register->setEducationId($educationId);
           $register->setStatusId($status_id);
           $registerCreate = $this->db->create('student', $register->toArray());
           if( $registerCreate){
            setMessage('success', 'Create successful!');
            redirect('pages/dashboard');
        }else{
            echo "Not success";
        }
        }
    }
    }
      
    public function edit($id)
    {   $register = $this->db->getById('student', 'id', 3);
        $this->view('pages/edit', $register);
    }

    public function show(){
     $this->view('pages/view');
    }

    public function updateStatus() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            // for student
            $id = $_POST['id'];
            $student_data = $this->db->getById('vw_student', 'id', $id);
            if($student_data[0]['status_id'] == 1){
                $status_id = 2;
            }elseif($student_data[0]['status_id'] == 2){
                $status_id = 1;
            }
           
            $name = $student_data[0]['name'];
            $email=$student_data[0]['email'];
            $password=$student_data[0]['password'];
            $father_name = $student_data[0]['father_name'];
            $date_of_birth = $student_data[0]['date_of_birth'];
            $gender = $student_data[0]['gender'];
            $is_confirmed='1';
            $is_active='1';
            $is_login='0';
            $token='';
            $date='';
            $token_expire='';
            $user_type_id= $student_data[0]['user_type_id'];

            $img =  $student_data[0]['image'];
           
            $addressId = $student_data[0]['address_id'];
            $educationId =  $student_data[0]['education_id'];
            
            $register = new RegisterModel();
            $register->setId($id);
            $register->setName($name);
            $register->setEmail($email);
            $register->setPassword($password);
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
            $register->setAddressId($addressId);
            $register->setEducationId($educationId);
            $register->setStatusId($status_id);
            $register->setProfileImage($img);
            
            $updated = $this->db->update('student', $id, $register->toArray());
            
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

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            session_start();
            // for student
            $id = $_GET['id'];
            $student_data = $this->db->getById('student', 'id', $id);
            $status_id = $student_data[0]['status_id'];
            $name = $_POST['student_name'];
            $email=$_POST['email'];
            if($student_data[0]['password'] !== $_POST['password']){
                $password = base64_encode($_POST['password']);
            }else{
                $password = $_POST['password'];
            }
            
            $father_name = $_POST['father_name'];
            $date_of_birth = $_POST['date_of_birth'];
            $gender = $_POST['gender'];
            $is_confirmed='1';
            $is_active='1';
            $is_login='0';
            $token='';
            $date='';
            $token_expire='';
            $user_type_id= $student_data[0]['user_type_id'];

            //for address
            $city_id = $_POST['city'];
            $township_id = $_POST['townshipEdit'];
            $street_id=$_POST['street_name'];
            $block = $_POST['block'];
            $unit = $_POST['unit'];
           
            // for education
            if(!empty($_POST['semester'])){
                $semester_id=$_POST['semester'];
            }else{
                $semester_id= 0;
            }
            $subject_id = $_POST['specialization'];
            $achedamic_year_id = $_POST['achedamic'];

            // for image
            $msg = "";
            $img = $_FILES['image']['name'];
           
            $address = new AddressModel();
            $address->setId("");
            $address->setBlock($block);
            $address->setUnit($unit);
            $address->setStreetId($street_id);
            $address->setTownshipId($township_id);
            $isAddressExist = $this->db->getAddressId('address', $unit, $block, $street_id);
            if($isAddressExist){
               $addressId = $isAddressExist['id'];
            } else{
                $addressCreate = $this->db->create('address', $address->toArray());
                $addressId = (int)$addressCreate;
            }
           
            
            $education=new EducationModel();
            $education->setId("");
            $education->setSemesterId($semester_id);
            $education->setSubjectId($subject_id);
            $education->setAchedamicYearId($achedamic_year_id);
            $isEducationIdExist = $this->db->getEducationId('education',$subject_id,$semester_id,$achedamic_year_id);
            if($isEducationIdExist){
                $educationId = $isEducationIdExist['id'];
            }else{
                $educationCreate=$this->db->create('education',$education->toArray());
                $educationId = (int)$educationCreate;
            }

            $register = new RegisterModel();
            $register->setId($id);
            $register->setName($name);
            $register->setEmail($email);
            $register->setPassword($password);
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
            $register->setAddressId($addressId);
            $register->setEducationId($educationId);
            $register->setStatusId($status_id);
            if(empty($img))
            {   
                $edit_query = $this->db->getById('student', 'id', $id);
                $newImage = $edit_query[0]['profile_image'];
                $register->setProfileImage($newImage);
            } else{
                    $milliseconds = round(microtime(true) * 1000);
                    $image['name'] = $milliseconds . $_FILES['image']['name'];
                    $target_dir = "upload_images/$id/";
                    $target_file = $target_dir . basename($image['name']);
                if (is_dir("upload_images/$id/")) {
                    $mydir = "upload_images/$id/"; 
                    $myfiles = array_diff(scandir($mydir), array('.', '..'));
                    foreach($myfiles as $myfile) {
                        unlink("upload_images/$id/".$myfile); 
                    }
                
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $msg = "Image uploaded successfully";
                        $register->setProfileImage($image['name']);
                    }else{
                        $msg = "Failed to upload image";
                    }
               
                } else{
                    mkdir("upload_images/$id/");
                    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                        $msg = "Image uploaded successfully";
                        $register->setProfileImage($image['name']);
                    }else{
                        $msg = "Failed to upload image";
                    }
                }
            
            }       

            $updated = $this->db->update('student', $id, $register->toArray());
            
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
        $isdestroy = $this->db->delete('student', $id);
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