<?php require_once APPROOT . '/views/inc/header.php'; ?>

<?php
    // require "connect.php";
    $usernameErr="";
    $emailErr="";
    $passwordErr = "";
    if(isset($_POST['singin'])){
        echo "hello";
        redirect('pages/login');
    }
    if(isset($_POST['register'])){
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        if(empty($username)){
            $usernameErr='The username field is required';
        }
        if(empty($email)){
            $emailErr='The email field is required';
        }
        if(empty($password)){
            $passwordErr='The password field is required';
        }
        if(!empty($username)&& !empty($email)){
        // $sql="INSERT INTO posts(username,emailription) VALUES('$username','$email')";
        // $db->exec($sql);
        // $_SESSION['successMsg']='A post created successfully';
        // header('location:index.php');
        echo "Hello World";
        }  
    }
    ?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body> -->
   <div class="wrapper">
      
        <form class="form-left" method="POST">
            <h2 class="text-uppercase">Information</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="form-field">
                <input type="submit" class="form_left_button" value="Sign In" name="singin" id="singin">
            </div>
                <img src="<?php echo URLROOT; ?>/images/student_photo.png" alt="" class="student_logo">
</form>
        <form class="form-right needs-validation" name="contactForm" method="POST">
            <h2 class="text-uppercase">Registration form</h2>
            <!-- <div class="row"> -->
                <div class=" mb-3">
                    <label>User Name</label>
                    <input type="text" name="username" id="first_name" class="form-control <?php if($usernameErr!= ''):?>is-invalid<?php endif ?>" username="" placeholder="Enter Your Name">
                        <span class="text-danger"><?php echo $usernameErr; ?></span>
                </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control  <?php if($emailErr!= ''):?>is-invalid<?php endif ?>" name="email" username="" placeholder="Enter Your Email">
                    <span class="text-danger"><?php echo $emailErr; ?></span>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <div class="show_psw">
                        <input type="password" name="password" id="pwd" class="form-control is-invalid" username="" placeholder="Password">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password" id="cpwd" class="form-control is-invalid" username="" placeholder="Confirm Password">
                </div>
            </div>
            <div class="mb-3">
                <label class="option">I agree to the <a href="#">Terms and Conditions</a>
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-md-12 text-center ">
                <input type="submit" value="Register" class="form_right_button" name="register">
            </div>
        </form>
    </div>
<!-- 
   </body>
</html> -->
<!-- 
<script src="dist/jbvalidator.min.js"></script> -->
        <!-- <script>
            $(function (){

                let validator = $('.needs-validation').validator({
                    errorMessage: true,
                    successClass: true,
                });

                //custom validate methode
                validator.validator.custom = function(el, event){
                    if($(el).is('[name=password]') && $(el).val().length < 5){
                        return 'Your password is too weak.';
                    }
                }

                validator.validator.example = function(el, event){
                    if($(el).is('[name=username]') && $(el).val().length < 3){
                        return 'Your username is too short.';
                    }
                }

                //check form without submit
                validator.checkAll(); //return error count

                //reload instance after dynamic element is added
                validator.reload();
            })
        </script> -->
