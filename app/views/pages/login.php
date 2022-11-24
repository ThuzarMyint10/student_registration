<?php require_once APPROOT . '/views/inc/header.php'; ?>

    ?>

    <div class="wrapper">
        <div class="form-left">
        
            <h2 class="text-uppercase">New Here ?</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <!-- <div class="form-field">
                <input type="submit" class="account" value="Have an Account?">
            </div> -->
            <div class="form-field">
            <a href="<?php echo URLROOT; ?>/pages/register">
                <input type="submit" class="form_left_button" value="Register" name="register">
            </a>
            </div>
        
        <img src="<?php echo URLROOT; ?>/images/student_photo.png" alt="" class="student_logo"> 
    </div>
    
        <form class="form-right" name="contactForm" method="POST" action="<?php echo URLROOT; ?>/auth/login">
            <h2 class="text-uppercase">Sign In  form</h2>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="input-field" name="email" required  title="" placeholder="Enter Your Email">
            </div>

                <div class="mb-3">
                    <label>Password</label>
                    <div class="show_psw">
                        <input type="password" name="password" id="pwd" class="input-field" title="" placeholder="Password">
                        <!-- <i class="uil uil-eye-slash"></i> -->
                    </div>
                </div>
            <div class="mb-3">
                <label class="option">Remember me
                    <input type="checkbox" checked>
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="col-md-12 text-center ">
                <input type="submit" value="Sign In" class="form_right_button" name="signin">
                <p class="social_text">
                    Or Login with social platforms
                 </p>
                 <div class="social_icons">
                 <i class="social_icon uil uil-facebook"></i>
                 <i class="social_icon uil uil-twitter"></i>
                 <i class="social_icon uil uil-instagram-alt"></i>
                 <i class="social_icon uil uil-whatsapp-alt"></i>
                </div>
            </div>
          
        </form>
        <a href="#" class=" bottom-left"> <p class="col-md-12 text-center">
            create new account? 
       </p>
    </a>
    </div>