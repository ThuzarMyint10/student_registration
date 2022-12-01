<?php require_once APPROOT . '/views/inc/header.php'; ?>


    <div class="row wrapper">
        <div class="col-5 form_left">
        
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
    <div class="col-7 form_right">
        <form name="contactForm" method="POST" action="<?php echo URLROOT; ?>/auth/login">
            <h2 class="text-uppercase">Sign In  form</h2>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                   
            </div>
            <div class="text-danger">
						<?php
							if(isset($data['email-err']))
							echo $data['email-err'];
						?>
					</div>

                <div class="mb-3">
                    <label>Password</label>
                    <div class="show_psw">
                        <input type="password" name="password" id="pwd" class="form-control" title="" placeholder="Password">
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
    </div>
        <a href="#" class="button-left"> <p class="col-md-12 text-center">
            create new account? 
       </p>
    </a>
    </div>

<script>
    $(function() {
        var str=$('name').val();
		if(/^[a-zA-Z- ]*$/.test(str) == false) {
				alert('Your search string contains illegal characters.');
			}
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
		

            $(function () {

var str=$('name').val();
if(/^[a-zA-Z- ]*$/.test(str) == false) {
        alert('Your search string contains illegal characters.');
    }
    // Fetch all the forms we want to apply custom Bootstrap validation styles to


    
$("form[name='contactForm']").validate({
    // Define validation rules
    errorClass: "is-invalid",
    validClass: 'is-valid',
    rules: {
        email: "required",
        password: "required",
        email: {
            required: true,
            minlength: 6,
            maxlength: 50,
            email: true
        },
        password: {
            minlength: 8,
            maxlength: 30,
            required: true,
        },
        
    },
    // Specify validation error messages
    //  config error message
    messages: {
        
        email: {
            required: "Please enter your email",
            minlength: "Please enter a valid email address",
        },
        password: {
            required: "Please enter your password",
            minlength: "Password length must be min 8 characters long",
            maxlength: "Password length must not be more than 30 characters long"
        },
        
    },
    
    submitHandler: function (form) {
        form.submit();
    }
});

});
    });
</script>