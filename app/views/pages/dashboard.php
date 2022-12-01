
<?php require_once APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Student Crud Operation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    
    <!--Fontawesome-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  </head>
  <body class="bg-color">
    <div class="container">
      <div class="row">
        <div class="col-4 col-md-3 col-lg-2 float-start">
          <img src="<?php echo URLROOT; ?>/images/logo1.png" alt="" class="img-fluid" />
        </div>
        <div class="col-8 col-md-9 col-lg-10 ps-0 ms-0">
          <h3 class="pt-5 pt-md-5 ps-0 ms-0">Acadamy</h3>
          <small class="ps-0 ms-0">Let's Learn & Share Together!</small>
        </div>
      </div>
      <hr class="divided" />
      <a href="#" class="btn button_color"
        ><i class="fa fa-arrow-circle-left"></i> Log out</a
      >
      <button
        class="btn button_color"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
      >
        <i class="fa fa-plus"></i> Add New Student
      </button>
      <a href="#" class="btn button_color float-end">
        <i class="fa-solid fa-print"></i> Print PDF
      </a>
      
      <hr class="divided" />
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">S.L</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Student Id</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">User Id</th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          try{
            $database=new Database();
            $run_datas=$database->readAll('register');
            $i=0;
            foreach($run_datas as $row){
              $s1=++$i;
              $id=$row['id'];
              $sname=$row['sname'];
              $email=$row['email'];
              $user_id=$row['user_id'];
              ?>
              <tr>
            <td class="text-center"><?php echo $s1;?></td>
            <td class="text-left"><?php echo $row['sname'];?></td>
            <td class="text-left"><?php echo $row['id'];?></td>
            <td class="text-left"><?php echo $row['email'];?></td>
            <td class="text-center"><?php echo $user_id;?></td>
            <td class="text-center">
              <span>
                <a
                  href="#view<?= $id ?>"
                  class="btn btn-success mr-3 profile"
                  data-bs-toggle="modal"
                  title="Profile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#edit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="<?php echo URLROOT; ?>/Register/destroy?id=<?= $row['id'] ?>" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <?php  }
          }
          catch(PDOException $e){
            echo $e->getMessage();
          }
          ?> 
        </tbody>
      </table>

      <a href="#" class="btn button_color mt-3">
        <i class="fa-solid fa-file-excel"></i> Export Data
      </a>

      <!-- <form method="post" action="#">
			<input type="submit" name="export" class="btn button-color" value="Export Data" />
		</form> -->
    </div>
    <!-- Student Create form modal-->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <img src="<?php echo URLROOT; ?>/images/logo1.png" width="150px" height="150px" alt="" />
            <br />
            <h3 class="img-responsive" id="staticBackdropLabel">
              Student Registration Form
            </h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo URLROOT; ?>/Register/store" method="POST" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="studentname">Student Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="sname"
                    placeholder="Enter Your Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder="Enter Your Father Name"
                  />
                </div>
              </div>
              <div class="row pt-3" style="color: #5f5e9e">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Enter Your email"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="aadharno">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    name="address"
                    placeholder="Enter Your Address "
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                  <select
                    id="inputState"
                    name="gender"
                    class="form-control"
                  >
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputCity">Subject</label>
                  <!-- <input type="text" class="form-control" name="dist"> -->
                  <select name="subject" class="form-control">
                    <option selected>Choose...</option>
                    <option >Computer Science</option>
                    <option>
                      Information Technology
                    </option>
                    <option>
                      Computer Architecture
                    </option>
                    <option>Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Specialization</label>
                  <select name="specialization" class="form-control">
                    <option selected>Choose...</option>
                    <option>Computer Science</option>
                    <option>
                      Information Technology
                    </option>
                    <option>
                      Computer Architecture
                    </option>
                    <option>Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Degree</label>
                  <input type="text" class="form-control" name="degree" />
                </div>
              </div>
              <div class="form-group pt-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
              </div>
              
              <!-- <input type="submit" name="submit" class="btn button-color w-25 h-25" value="Submit"> -->
              <button
              name="submit"
                type="submit"
                class="btn button_color create mt-5 float-end"
              >
                Create
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

<!-- view button -->
  <?php 
      $database=new Database();
      $view_datas=$database->readAll('register');
      foreach($view_datas as $row){
		$id = $row['id'];
		$sname = $row['sname'];
		$fname= $row['fname'];
		$email = $row['email'];
		$address = $row['address'];
		$date_of_birth = $row['date_of_birth'];
		$gender= $row['gender'];
		$subject = $row['subject'];
		$specialization = $row['specialization'];
		$degree = $row['degree'];
		$img = $row['image'];
    		echo " 
			<div class='modal fade' id='view$id' >
					<div class='modal-dialog modal-dialog-lg'>
						<div class='modal-content'>
							<div class='modal-header'>
								<h5 class='modal-title'>Profile  <i class='fa-solid fa-user'></i>
								</h5>
								<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
								</button>
							</div>
						<div class='modal-body'>
							<div class='container' id='profile'> 
								<div class='row'>
									<div class='col-sm-6'>
										<img src='/student_registration/public/upload_images/$img' alt='image' class='img-fluid' ><br><br>
										<i class='fa fa-phone' aria-hidden='true'></i> $email  <br>
									
									</div>
									<div class='col-sm-6'>
										<h3 class='text-primary'>$sname</h3>
										<p class='text-secondary'>
										<strong>Father Name:</strong> $fname <br>
										<strong>Gender &nbsp;<i class='fa fa-venus-mars' aria-hidden='true'></i>:</strong> $gender <br>
										<strong>Date Of Birth:</strong>$date_of_birth <br>
										<strong>Subject :</strong>$subject <br>
										<strong>Specialization :</strong>$specialization <br>
										<strong>Degree :</strong>$degree <br>
										<br />
										<i class='fa fa-home' aria-hidden='true'> Address : </i> <strong>Addres:</strong> $address <br>
									</div>
								</div>   
							</div>
						</div>
						<div class='modal-footer'>
							<button type='button' class='btn button_color' data-bs-dismiss='modal'>Close</button>
						</div>
						
						</div>
					</div>
				</div> 
				";
			} 
	?>


    <!-- Student Edit form modal-->
    <?php
    $database=new Database();
    $edit_datas=$database->readAll('register');
    foreach($edit_datas as $data){
   	$id = $data['id'];
		$sname = $data['sname'];
		$fname= $data['fname'];
		$email = $data['email'];
		$address = $data['address'];
		$date_of_birth = $data['date_of_birth'];
		$gender= $data['gender'];
		$subject = $data['subject'];
		$specialization = $data['specialization'];
		$degree = $data['degree'];
		$img = $data['image'];
	?>
<div class='modal fade' id='edit'>
	<div class='modal-dialog modal-lg'>
	  	<div class='modal-content'>
			<div class='modal-header'>
				<img src='<?php echo URLROOT; ?>/images/logo1.png' width='150px' height='150px' alt=''>
				<br>
				<h3 class='img-responsive' id='staticBackdropLabel'>Student Edition Form</h3>
		  		<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
		  		</button>
			</div>
			<div class='modal-body'>
				<form action='<?php echo URLROOT; ?>/Register/update' method='POST' enctype='multipart/form-data'>
					<div class='row'>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
						<div class='form-group col-md-6'>
							<label for='name'> Name</label>
							<input type='text' class='form-control' name='sname' placeholder='Enter Student Name' value ="<?php echo $sname?>">
						</div>
						<div class='form-group col-md-6'>
							<label for='fname'>Father Name</label>
							<input type='text' class='form-control' name='fname' placeholder='Enter Father Name' value = "<?php echo $fname?>">
						</div>
					</div>
					<div class='row pt-3' style='color: #5F5E9E'>
						<div class='form-group col-md-6'>
							<label for='mobile'>Mobile</label>
							<input type='mobile' class='form-control' name='email' placeholder='Enter Your Email' value = "<?php echo $email?>">
						</div>
						<div class='form-group col-md-6'>
							<label for='address'>Address</label>
							<input type='text' class='form-control' name='address'  placeholder='Enter your Address ' value = "<?php echo $address?>">
						</div>
					</div>
					<div class='row pt-3'>
						<div class='form-group col-md-6'>
							<label for='dob'>Date of Birth</label>
							<input type='date' class='form-control' name='date_of_birth' placeholder='Date of Birth' value = "<?php echo $date_of_birth?>">
						</div>
						<div class='form-group col-md-6'>
							<label for='gender'>Gender</label>
							<select id='gen' name='gender' class='form-control' value = "<?php echo $gender?>">
								<option selected>"<?php echo $gender?>"</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select>
						</div>
					</div>
					<div class='row pt-3 '>
						<div class='form-group col-md-6'>
							<label for='subject'>Subject</label>
							<select name='subject' class='form-control' value = "<?php echo $subject?>">
								<option>"<?php echo $subject?>"</option>
								<option value='Computer Science'>Computer Science</option>
								<option value='Information Technology'>Information Technology</option>
								<option value='Computer Architecture'>Computer Architecture</option>
								<option value='Tele Communication'>Tele Communication</option>
							</select>
						</div>
						<div class='form-group col-md-4'>
							<label for='specialization'>Specialization</label>
							<select name='specialization' class='form-control' value = "<?php echo $specialization?>">
								<option selected>"<?php echo $specialization?>"</option>
								<option value='Computer Science'>Computer Science</option>
								<option value='Information Technology'>Information Technology</option>
								<option value='Computer Architecture'>Computer Architecture</option>
								<option value='Tele Communication'>Tele Communication</option>
							</select>
						</div>
						<div class='form-group col-md-2'>
							<label for='degree'>Degree</label>
							<input type='text' class='form-control' name='degree' value ="<?php echo $degree?>">
						</div>
					</div>
					   <div class='form-group pt-3 '>
						    <label>Image</label>
							<input type='file' name='image' class='form-control' >
							<img src = '<?php echo URLROOT; ?>/upload_images/"<?php echo $img?>"' style='width:50px; height:50px'>
					   </div>
					<input type='submit' name='submit' class='btn button_color float-end mt-3 ' value='Submit'>
				</form>	
			</div>		
		</div>
	</div>
</div>
	<?php
	}
?>
 
    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>
  </body>
</html>
