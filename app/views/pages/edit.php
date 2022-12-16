<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>
<!-- Student Edit form modal-->
    <?php
    $database=new Database();
    $personal_datas=$database->readAll('student');
    foreach($personal_datas as $data){
   	    $id = $data['id'];
		$name = $data['name'];
		$email = $data['email'];
		$url = URLROOT;
    echo"
    <div class='modal fade' id='edit$id'>
	<div class='modal-dialog modal-lg'>
	  	<div class='modal-content'>
			<div class='modal-header'>
				<img src='$url/public/images/logo1.png' width='150px' height='150px' alt=''>
				<br>
				<h3 class='img-responsive' id='staticBackdropLabel'>Student Edition Form</h3>
		  		<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
		  		</button>
			</div>
			<div class='modal-body'>
				<form action='$url/Register/update/' method='POST' enctype='multipart/form-data'>
        <input type='hidden' value='$id' name='id' />
					<div class='row'>
                <div class='form-group col-md-6'>
                  <label for='studentname'>Student Name</label>
                  <input
                    type='text'
                    class='form-control'
                    name='name'
                    value='$name'
                    placeholder='Enter Your Name'  required
                  />
                </div>
                <div class='form-group col-md-6'>
                  <label for='fathername'>Father Name</label>
                  <input
                    type='text'
                    class='form-control'
                    name='fname'
                    value='$father_name'
                    placeholder='Enter Your Father Name' required
                  />
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='email'>Email</label>
                  <input
                    type='email'
                    class='form-control'
                    name='email'
                    value='$email'
                    placeholder='Enter Your email' required
                  />
                </div>
                <div class='form-group col-md-6'>
                  <label for='password'>Date of Birth</label>
                  <input
                    type='date'
                    class='form-control'
                    name='date_of_birth'
                    value='$date_of_birth'
                    placeholder='Date of Birth' required
                  />
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='inputState'>Gender</label>
                    <select class='form-select' name='gender' value='$gender' required>
                          <option selected disabled value=''>$gender</option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Others</option>
                      </select>
                  </div>
                <div class='form-group col-md-6'>
                  <label for='address'>Blog</label>
                  <input
                    type='text'
                    class='form-control'
                    name='blog'
                    value='$blog'
                    placeholder='Enter Your blog' required
                  />
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='address'>Street</label>
                  <input
                    type='text'
                    class='form-control'
                    name='street'
                    value='$street'
                    placeholder='Enter Your street' required
                  />
                </div>
                <div class='form-group col-md-6'>
                  <label for='address'>Township</label>
                  <input
                    type='text'
                    class='form-control'
                    name='township'
                    value='$township'
                    placeholder='Enter Your township' required
                  />
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='address'>City</label>
                  <input
                    type='text'
                    class='form-control'
                    name='city'
                    value='$city'
                    placeholder='Enter Your City' required
                  />
                </div>
                <div class='form-group col-md-6'>
                  <label for='education'>Semester</label>
                  <select class='form-select' id='validationDefault04' name='semester' value='$semester' required>
                    <option selected disabled value=''>$semester</option>
                    <option>First Semester</option>
                    <option>Second Semester</option>
                  </select>
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='education'>Specialization</label>
                  <select class='form-select' id='validationDefault04' name='specialization' value='$specialization' required>
                    <option selected disabled value=''>$specialization</option>
                    <option>Computer Science</option>
                    <option>Information Technology</option>
                    <option>Computer Architecture</option>
                    <option>Tele Communication</option>
                  </select>
                </div>
                <div class='form-group col-md-6'>
                  <label for='education'>Degree</label>
                  <input type='text' class='form-control' name='degree' value='$degree' placeholder='Enter Your Degree' required/>
                </div>
              </div>
              <div class='form-group pt-3'>
                <label>Image</label>
							  <input type='file' name='image' class='form-control' >
							  <img src = '$url/public/upload_images/$img' style='width:50px; height:50px'>
              </div>
              <button
              name='submit'
                type='submit'
                class='btn button_color create mt-5 float-end'
              >
                Update
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
		";
	}
?>

<?php require APPROOT . '/views/inc/footer.php'; ?>
