<?php ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Register</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <!-- <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body>
   <div class="wrapper">
      
        <div class="form-left">
            <h2 class="text-uppercase">information</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="form-field">
                <input type="submit" class="form_left_button" value="Sign In">
            </div>
                <img src="images/student_photo.png" alt="" class="student_logo">
</div>
        <form class="form-right needs-validation" name="contactForm" method="POST">
            <h2 class="text-uppercase">Registration form</h2>
            <!-- <div class="row"> -->
                <div class=" mb-3">
                    <label>User Name</label>
                    <input type="text" name="username" id="first_name" class="form-control" title="" placeholder="Enter Your Name">
                </div>
                <!-- <input type="text" class="form-control is-invalid" title="" placeholder="Enter Your Name"> -->
                <!-- <div class="col-sm-6 mb-3">
                    <label>Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" title="" placeholder="Last Name">
                </div> -->
            <!-- </div> -->
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control is-invalid" name="email" title="" placeholder="Enter Your Email">
            </div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <div class="show_psw">
                        <input type="password" name="password" id="pwd" class="form-control is-invalid" title="" placeholder="Password">
                        <!-- <i class="uil uil-eye-slash"></i> -->
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="cpwd" id="cpwd" class="form-control is-invalid" title="" placeholder="Confirm Password">
                    <!-- <i class="uil uil-eye-slash"></i> -->
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>

<script src="dist/jbvalidator.min.js"></script>
        <script>
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
        </script>
