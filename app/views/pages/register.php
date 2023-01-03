<?php
require_once APPROOT . '/views/inc/header.php'; ?>

   <div class="row wrapper">
    <div class="col-5 form_left">
		<h2 class="text-uppercase text-white">Informations</h2>
            <p class="text-white">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
                <a href="<?php echo URLROOT; ?>/pages/login">
               <input type="submit" class="form_left_button" value="Sign In" name="singin" id="singin">
               </a>
        <img src="<?php echo URLROOT; ?>/images/student_photo.png" alt="" class="student_logo"> 
    </div>
	<div class="col-7 form_right">
	
        <form name="contactForm" method="POST" action ="<?php echo URLROOT; ?>/auth/register">
			<?php require APPROOT . '/views/components/auth_message.php'; ?>
            <h2 class="text-uppercase">Registration form</h2>
           
			<div class="mb-3">
				<label>User Name</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name" required> 
			</div>
			<div class="text-danger">
				<?php if (isset($data['name-err'])) {
        			echo $data['name-err'];
   				 } ?>
			</div>
               
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
                   
            </div>
            <div class="text-danger">
					<?php if (isset($data['email-err'])) {
        				echo $data['email-err'];
    				}?>
			</div>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    
					<div class="show_psw">
                      	<input type="password" name="password" id="pwd" class="form-control" placeholder="Password" style="display: inline-block;">
            			<i class="uil uil-eye icon" style="position: absolute; margin-left: -43px; margin-top: 9.5px; cursor: pointer;color: green;" id="eye"></i>
          			</div>
                    <div class="text-danger">
						<?php if (isset($data['password-err'])) {
         				 echo $data['password-err'];
     					 } ?>
					</div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Confirm Password</label>
					
					<div class="show_psw">
                      	<input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Confirm Password" style="display: inline-block;">
            			<i class="uil uil-eye icon" style="position: absolute; margin-left: -43px; margin-top: 9.5px; cursor: pointer;color: green;" id="eye1"></i>
          			</div>
					<div class="text-danger">
						<?php if (isset($data['cpassword-err'])) {
          				echo $data['cpassword-err'];
     				 } ?>
					</div>
				</div>
                
            <div class="col-md-12 text-center ">
                <input type="submit" value="Register" class="form_right_button" name="register">
            </div>
        </form>
	</div>
    </div>
					
	<!-- echo "<script type=\"text/javascript\">self.opener.document.getElementById('error').innerHTML='Error:Show Error';window.close();</script>"; -->
                
<script>

	// Show Password//////////////////////////////////

    const passwordField = document.querySelector("#pwd")
    const eye = document.querySelector("#eye")

    eye.addEventListener("click", function(){
        this.classList.toggle("uil-eye-slash")
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password"
        passwordField.setAttribute("type", type)
    });

    const passwordField1 = document.querySelector("#cpassword")
    const eye1 = document.querySelector("#eye1")

    eye1.addEventListener("click", function(){
        this.classList.toggle("uil-eye-slash")
        const type1 = passwordField1.getAttribute("type") === "password" ? "text" : "password"
        passwordField1.setAttribute("type", type1)
    });

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
                name: "required",
                email: "required",
                password: "required",
				cpassword: "required",
                name: {
					required: true,// to show configuration error message
					minlength: 6,// limit input value, 	Input value must have greater than or equal to minLength character length
                    maxlength: 20,//limit input value, 	Input value must have less than or equal to maxLength character length
                },
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
				cpassword: {
					minlength: 8,
					maxlength: 30,
					required: true,
                },
                
            },
            // Specify validation error messages
			//  config error message
            messages: {
				
				name: {
				required: "Please enter your name",
				minlength: "Name must be min 6 characters long",
				},
                email: {
                    required: "Please enter your email",
                    minlength: "Please enter a valid email address",
                },
                password: {
                    required: "Please enter your password",
                    minlength: "Password length must be min 8 characters long",
                    maxlength: "Password length must not be more than 30 characters long"
                },
				cpassword: {
                    required: "Please enter your confirm password",
                    minlength: "Confirm Password length must be min 8 characters long",
                    maxlength: "Confirm Password length must not be more than 30 characters long"
                },
                
            },
			
            submitHandler: function (form) {
                form.submit();
            }
        });

	 });

	// Email Validation
	$(document).ready(function() {

// form autocomplete off
// call input tag, set attribute [attr(attribute,value)]	
$(":input").attr('autocomplete', 'off');

// remove box shadow from all text input
// call input tag
$(":input").css('box-shadow', 'none');


// remove focus from the text field, remove cursor
$("#name").blur(function() {

var name  		= 		$('#name').val();//to get the values of form elements(input field)


// if name is empty then return
if(name == "") {
	return;
}
// call formRegister method from controllers>auth>formRegister()
var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

// send ajax request if name is not empty
$.ajax({
		url:form_url,
		type: 'post',
		data: {
			'name':name,

	},

	success:function(response) {	
	
		// clear span before error message
		$("#name_error").remove();
	
		// adding span after name textbox with error message
		$("#name").after("<span id='name_error' class='text-danger'>"+response+"</span>");
	},

	error:function(e) {
		$("#result").html("Something went wrong");
	}

});
});


// ------------------- [ Email blur function ] -----------------

$("#email").blur(function() {

	var email  		= 		$('#email').val();


	// if email is empty then return
	if(email == "") {
		return;
	}
	var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

	// send ajax request if email is not empty
	$.ajax({
			url:form_url,
			type: 'post',
			data: {
				'email':email,
				'email_check':1,
		},
	
		success:function(response) {	
		
			// clear span before error message
			$("#email_error").remove();
		
			// adding span after email textbox with error message
			$("#email").after("<span id='email_error' class='text-danger'>"+response+"</span>");
		},
	
		error:function(e) {
			$("#result").html("Something went wrong");
		}
	
	});
});
$("#passsword").blur(function() {

var password = $('#password').val();


// if password is empty then return
if(password == "") {
	return;
}
var form_url = '<?php echo URLROOT; ?>/auth/formRegister';

// send ajax request if password is not empty
$.ajax({
		url:form_url,
		type: 'post',
		data: {
			'password':password,

	},

	success:function(response) {	
	
		// clear span before error message
		$("#password_error").remove();
	
		// adding span after password textbox with error message
		$("#password").after("<span id='password_error' class='text-danger'>"+response+"</span>");
	},

	error:function(e) {
		$("#result").html("Something went wrong");
	}

});
});


// -----------[ Clear span after clicking on inputs] -----------

$("#name").keyup(function() {
	$("#error").remove();
});


$("#email").keyup(function() {
	$("#error").remove();
	$("span").remove();
});

$("#password").keyup(function() {
	$("#error").remove();
});

$("#c_password").keyup(function() {
	$("#error").remove();
});

});

</script>