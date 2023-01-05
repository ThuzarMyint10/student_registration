<?php

class Auth extends Controller
{
    private $db;
    public function __construct()
    {
        $this->model('RegisterModel');
        $this->db = new Database();
    }

    public function formRegister()
    {
        if (
            $_SERVER['REQUEST_METHOD'] == 'POST' &&
            isset($_POST['email_check']) &&
            $_POST['email_check'] == 1
        ) {
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('student', 'email', $email);
            if ($isUserExist) {
                echo 'Sorry! email has already taken. Please try another.';
            }
        }
    }

    public function register()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Check user exist
            $email = $_POST['email'];
            // call columnFilter Method from Database.php
            $isUserExist = $this->db->columnFilter('student', 'email', $email);
            if ($isUserExist) {           
                setMessage('error','Email is already registered!');
                redirect('pages/register');
            } else {
                // Validate entries
                $validation = new UserValidator($_POST);
                $data = $validation->validateForm();
                if (count($data) > 0) {
                    $this->view('pages/register', $data);
                } else {
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $profile_image = 'default_profile.jpg';
                    $token = bin2hex(random_bytes(50));
                    date_default_timezone_set('Asia/Rangoon');
                    $date = date('Y-m-d');
                    $tokenExpire = date('Y-m-d', strtotime("+1 day", strtotime($date)));
                    var_dump($tokenExpire);
                    //Hash Password before saving
                    $password = base64_encode($password);

                    $studentData = $this->db->readAllByLimit('student');
                    if(empty($studentData)){
                        $studentId = "";
                    }else{
                        $studentId = $studentData[0]['id']+1;
                    }

                    $user = new RegisterModel();
                    $user->setId($studentId);
                    $user->setName($name);
                    $user->setEmail($email);
                    $user->setPassword($password);
                    $user->setToken($token);
                    $user->setTokenExpire($tokenExpire);
                    $user->setProfileImage($profile_image);
                    $user->setIsLogin(DAFAULT_VALUE);
                    $user->setIsActive(DAFAULT_VALUE);
                    $user->setIsConfirmed(DAFAULT_VALUE);
                    $user->setDate($date);
                    $user->setUserTypeId(NORMAL_USER_ID);
                    $user->setFatherName('');
                    $user->setDateOfBirth('');
                    $user->setGender('');
                    $user->setAddressId(DAFAULT_VALUE);
                    $user->setEducationId(DAFAULT_VALUE);
                    $user->setStatusId(ACTIVE_VALUE);
                    $user->setPerformanceId(NORMAL);
                    // $user->setDate("2022-12-07 14:51:09");

                    $userCreated = $this->db->create('student', $user->toArray());
                  
                    //$userCreated="true";

                    if ($userCreated) {
                        //Instatiate mail
                        $mail = new Mail();

                        // $verify_token = URLROOT . '/auth/verify/' . $token;
                        $mail->verifyMail($email, $name, $token);
                        setMessage('email', $email);
                        setMessage('token', $token);
                        setMessage('success', 'Please check your Mail box !');
                        redirect('pages/login');
                    }
                    redirect('pages/register');
                } // end of validation check
            } // end of user-exist
        }
    }

   
    public function resendToken($token)
    {  
        $users = $this->db->columnFilter('student', 'token', $token);
         
            $newToken = bin2hex(random_bytes(50));
            $id = $users['id'];
            $name = $users['name'];
            $email = $users['email'];
            date_default_timezone_set('Asia/Rangoon');
            $date = date('Y-m-d');
            $tokenExpire = date('Y-m-d', strtotime("+1 day", strtotime($date)));
            $user = new RegisterModel();
            $user->setId($id);
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($users['password']);
            $user->setToken($newToken);
            $user->setTokenExpire($tokenExpire);
            $user->setProfileImage($users['profile_image']);
            $user->setIsLogin(NO_LOGIN);
            $user->setIsActive(ACTIVE_VALUE);
            $user->setIsConfirmed(ACTIVE_VALUE);
            $user->setDate($date);
            $user->setUserTypeId($users['user_type_id']);
            $user->setFatherName($users['father_name']);
            $user->setDateOfBirth($users['date_of_birth']);
            $user->setGender($users['gender']);
            $user->setAddressId($users['address_id']);
            $user->setStatusId(ACTIVE_VALUE);
            $user->setPerformanceId(NORMAL);
            $user->setEducationId($users['education_id']);
    
            $userUpdated = $this->db->update('student',$users['id'], $user->toArray());
            //$userCreated="true";
    
            if ($userUpdated) {
                $mail = new Mail();
                // $verify_token = URLROOT . '/auth/verify/' . $token;
                $mail->verifyMail($email, $name, $newToken);    
                setMessage('success', 'Please check your Mail box !');
                redirect('pages/login');
            }
          
    }

    public function verify($token)
    {       $users = $this->db->columnFilter('student', 'token', $token);
            $origin = new DateTimeImmutable($users['token_expire']);
            $target = new DateTimeImmutable(date('Y-m-d'));
            $interval = date_diff($origin, $target);
            $tokenExpire = $interval->format("%R%a");
            if($tokenExpire > 1 || $tokenExpire == 1){   
                $this->view('pages/mail_body_template', $users);
            } else {
            $id = $users['id'];
            $name = $users['name'];
            $email = $users['email'];
            $token = $users['token'];
            $user = new RegisterModel();
            $user->setId($id);
            $user->setName($name);
            $user->setEmail($email);
            $user->setPassword($users['password']);
            $user->setToken($token);
            $user->setTokenExpire($users['token_expire']);
            $user->setProfileImage($users['profile_image']);
            $user->setIsLogin(NO_LOGIN);
            $user->setIsActive(ACTIVE_VALUE);
            $user->setIsConfirmed(ACTIVE_VALUE);
            $user->setDate($users['date']);
            $user->setUserTypeId($users['user_type_id']);
            $user->setFatherName($users['father_name']);
            $user->setDateOfBirth($users['date_of_birth']);
            $user->setGender($users['gender']);
            $user->setStatusId(ACTIVE_VALUE);
            $user->setPerformanceId(NORMAL);
            $user->setAddressId($users['address_id']);
            $user->setEducationId($users['education_id']);
    
            $userUpdated = $this->db->update('student', $id, $user->toArray());
            //$userCreated="true";
    
            if ($userUpdated) {
                setMessage('success', 'Please check your Mail box !');
                redirect('pages/login');
            }
            }
           
        
       
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $email = $_POST['email'];
                $password = base64_encode($_POST['password']);
                $isLogin = $this->db->loginCheck($email, $password);
                if ($isLogin) {
                    if($isLogin['is_login'] == ACTIVE_VALUE){
                        setMessage('error', 'User already Login!');
                        redirect('pages/login');
                    }
                    elseif($isLogin['status_id'] == SUSPEND){
                        setMessage('error', 'Your account is suspended!!!! You can not login! Please request again to admin!');
                       
                        // echo '<script>
                        // alert("Your account is rejected!!!! Please request again to admin!");
                        // </script>';
                        redirect('pages/login');
                    }
                    else{
                        setMessage('id', base64_encode($isLogin['id']));
                        $id = $isLogin['id'];
                        $setLogin = $this->db->setLogin($id);
                        redirect('pages/dashboard');
                    }
                   
                } else {
                    setMessage('error', 'Login Fail!');
                    redirect('pages/login');
                }
            }
        }
    }

    function logout()
    {
        session_start();
        // $this->db->unsetLogin(base64_decode($_SESSION['id']));

        //$this->db->unsetLogin($this->auth->getAuthId());

        $this->db->unsetLogin(base64_decode($_SESSION['id']));
        redirect('pages/login');
    }

   
}

