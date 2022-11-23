<?php require_once APPROOT . '/views/inc/header.php'; ?>

<?php
    // require "connect.php";
    // $usernameErr="";
    // $emailErr="";
    // $passwordErr = "";
    // // if(isset($_POST['singin'])){
    // //     echo "hello";
    // //     redirect('pages/login');
    // // }
    // if(isset($_POST['register'])){
    //     $username=$_POST['username'];
    //     $email=$_POST['email'];
    //     $password=$_POST['password'];
    //     if(empty($username)){
    //         $usernameErr='The username field is required';
    //     }
    //     if(empty($email)){
    //         $emailErr='The email field is required';
    //     }
    //     if(empty($password)){
    //         $passwordErr='The password field is required';
    //     }
    //     if(!empty($username)&& !empty($email)){
    //     // $sql="INSERT INTO posts(username,emailription) VALUES('$username','$email')";
    //     // $db->exec($sql);
    //     // $_SESSION['successMsg']='A post created successfully';
    //     // header('location:index.php');
    //     echo "Hello World";
    //     }  
    // }
    ?>

   <div class="wrapper">
        <form class="form-left" method="POST">
            <h2 class="text-uppercase">Information</h2>
        <div class="form-left">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            <div class="form-field">
                <a href="<?php echo URLROOT; ?>/pages/login">
               <input type="submit" class="form_left_button" value="Sign In" name="singin" id="singin">
               </a>
            </div>     
                <img src="<?php echo URLROOT; ?>/images/student_photo.png" alt="" class="student_logo">
               
        </div>
        <form class="form-right needs-validation" name="contactForm" method="POST" action ="<?php echo URLROOT; ?>/auth/register">
            <h2 class="text-uppercase">Registration form</h2>
            <!-- <div class="row"> -->
           
                <div class=" mb-3">
                    <label>User Name</label>
                    <input type="text" name="name" id="first_name" class="form-control <?php if($usernameErr!= ''):?>is-invalid<?php endif ?>" username="" placeholder="Enter Your Name">
                     
                </div>
                <p class="text-danger ml-4">
						<?php
							if(isset($data['name-err']))
							echo $data['name-err'];
						?>
					</p>
               
            <div class="mb-3">
                <label>Email</label>
                <input type="email" class="form-control" name="email" username="" placeholder="Enter Your Email">
                   
            </div>
            <p class="text-danger ml-4">
						<?php
							if(isset($data['email-err']))
							echo $data['email-err'];
						?>
					</p>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label>Password</label>
                    <div class="show_psw">
                        <input type="password" name="password" id="pwd" class="form-control is-invalid" username="" placeholder="Password">
                    </div>
                    <p class="text-danger ml-4">
						<?php
							if(isset($data['password-err']))
							echo $data['password-err'];
						?>
					</p>
                </div>
                <div class="col-sm-6 mb-3">
                    <label>Confirm Password</label>
                    <input type="password" name="password" id="cpwd" class="form-control is-invalid" username="" placeholder="Confirm Password">
                </div>
                <p class="text-danger ml-4">
						<?php
							if(isset($data['password-err']))
							echo $data['password-err'];
						?>
					</p>
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

    
<script>
	// Show Password
	function myFunction() {
		var x = document.getElementById("myInput");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
	}

    $(function () {

		var str=$('name').val();
		if(/^[a-zA-Z- ]*$/.test(str) == false) {
				alert('Your search string contains illegal characters.');
			}
        $("form[name='contactForm']").validate({
            // Define validation rules
            rules: {
                name: "required",
                email: "required",
                password: "required",
                
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