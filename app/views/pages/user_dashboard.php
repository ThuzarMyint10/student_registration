<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Student Crud Operation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
  </head>
  <body class="bg-color">
    <?php
    $database=new Database();
        $id = base64_decode($_SESSION['id']);
        $user=$database->getById('student', 'id', $id);
    ?>

     <div class="container">
      <div class="row">
        <div class="col-4 col-md-3 col-lg-2 float-start">
          <img src="<?php echo URLROOT; ?>/images/logo1.png" alt="" class="img-fluid" />
        </div>
        <div class="col-6 col-md-9 col-lg-10 ps-0 ms-0">
          <h3 class="pt-5 pt-md-5 ps-0 ms-0">Acadamy</h3>
          <small class="ps-0 ms-0">Let's Learn & Share Together!</small>
        </div>
        <div  class="col-2">
        <?php 
        $database=new Database();
        $id = base64_decode($_SESSION['id']);
        $admin=$database->getById('student', 'id',$id);
        ?>
        Welcome <?php echo $admin['name']; ?>
      </div>
      </div>
      
      <hr class="divided" />
      <a href="<?php echo URLROOT; ?>/auth/logout" class=" button_color"
        ><i class="fa fa-arrow-circle-left"></i> Log out</a
      >
      <button
        class=" button_color"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
      >
        <i class="fa fa-plus"></i> Add New Student
      </button>
      <button onclick="window.print()" class=" button_color float-end">Print PDF</button>
      
      <hr class="divided" />
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">S.L</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Student Id</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col">Mobile</th>
            <th class="text-center" scope="col">View</th>
           <?php if ($admin['user_type_id'] != 1) :?> 
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
             <?php endif; ?> 
           
          </tr>
        </thead>
        <tbody>
          <?php 
         
          try{
            $database=new Database();
             if ($admin['user_type_id'] != 1){
             $run_datas=$database->readAll('student');
             }
            //  else{
            //   echo $admin['id'];
            //   exit;
            //  $run_datas=$database->getById('register',$admin['id']);
            //  }
            $i=0;
            foreach($run_datas as $row){
              $s1=++$i;
              $id=$row['id'];
              $sname=$row['name'];
              $email=$row['email'];
              $phone=$row['phone'];
              ?>
              <tr>
            <td class="text-center"><?php echo $s1;?></td>
            <td class="text-left"><?php echo $row['name'];?></td>
            <td class="text-left"><?php echo $row['id'];?></td>
            <td class="text-left"><?php echo $row['email'];?></td>
            <td class="text-center"><?php echo $phone;?></td>
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
            <?php if ($admin['user_type_id'] != 1) :?>
           
            <td class="text-center">
              <span><a
                  href="#edit<?= $id ?>"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="<?php echo URLROOT; ?>/Register/destroy?id=<?= $row['id'] ?>" class="btn btn-danger deleteuser" title="Delete" onclick="return confirm('Are you sure?')">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
            <?php endif; ?> 
          </tr>
          <?php  }
          }
          catch(PDOException $e){
            echo $e->getMessage();
          }
          ?> 
        </tbody>
      </table>

      <a href="<?php echo URLROOT; ?>/Register/export" class="btn button_color mt-3">
        <i class="fa-solid fa-file-excel"></i> Export Data
      </a>
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
                    placeholder="Enter Your Name"  required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder="Enter Your Father Name" required
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Enter Your email" required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth" required
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                    <select class="form-select" id="validationDefault04" name="gender" required>
                          <option selected disabled value="">Choose...</option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Others</option>
                      </select>
                  </div>
                <div class="form-group col-md-6">
                  <label for="address">Blog</label>
                  <input
                    type="text"
                    class="form-control"
                    name="blog"
                    placeholder="Enter Your blog " required
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="address">Street</label>
                  <input
                    type="text"
                    class="form-control"
                    name="street"
                    placeholder="Enter Your street " required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="address">Township</label>
                  <input
                    type="text"
                    class="form-control"
                    name="township"
                    placeholder="Enter Your township " required
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="address">City</label>
                  <input
                    type="text"
                    class="form-control"
                    name="city"
                    placeholder="Enter Your City " required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="education">Semester</label>
                  
            <select class="form-select" id="validationDefault04" name="semester" required>
                                      
               <option selected="selected">Choose one</option>
                    <?php
                     $semester_datas=$database->readAll('semester');
                    if($semester_datas){
                        foreach($semester_datas as $data){
                            $semester_data = $data['name'];
                            $semester_id = $data['id'];
                            echo "<option value=$semester_id>$semester_data</option>";
                         }
                    }else{
                        foreach($semester_datas as $data){
                            echo "<option value='strtolower('meet')'>meet</option>";
                         }
                    }
        
                    ?>
            </select>

                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="education">Specialization</label>
                  <select class="form-select" id="validationDefault04" name="subject" required  onchange='GetDetail(this.value)'>
                                      
                    <option selected="selected">Choose one</option>
                    <?php
                         $specialization_datas=$database->readAll('subject');
                         if($specialization_datas){
                            foreach($specialization_datas as $data){
                            $specialization_data = $data['specialization'];
                            $degree = $data['id'];
                            echo "<option value=$degree>$specialization_data</option>";
                            }
                         }else{
                             foreach($specialization_datas as $data){
                             echo "<option value='strtolower('meet')'>meet</option>";
                          }
                         }
                        
                    ?>
                   </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="education"> degree</label>
                  <input type="text" class="form-control" id="degree" name="degree"  placeholder="Enter Your Degree" required/>
                </div>
              </div>
              <div class="form-group pt-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" required/>
              </div>
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
     

    <script>
  
  // onkeyup event will occur when the user 
  // release the key and calls the function
  // assigned to this event
  function GetDetail(str) {

     if(str == 1)   {
      document.getElementById("degree").value = "B.C.Sc";
          return;
     }
     if(str == 2){
      document.getElementById("degree").value = "IT";
      return;
     }
     if(str == 3){
      document.getElementById("degree").value = "CA";
      return;
     }
     if(str == 4){
      document.getElementById("degree").value = "TC";
      return;
     }
     else{
            document.getElementById("degree").value = " ";
            return;
          }
    }
    </script>

<!-- view button -->
  <?php 
      $database=new Database();
      $personalView_datas=$database->readAll('register');
      foreach($personalView_datas as $row){
        $id = $row['id'];
        $sname = $row['sname'];
        $fname= $row['fname'];
        $email = $row['email'];
        $date_of_birth = $row['date_of_birth'];
        $gender= $row['gender'];
        $img = $row['image'];

    $addressView_datas=$database->readAll('addresses');
    foreach($addressView_datas as $row){
      $blog=$row['blog'];
      $street=$row['street'];
      $township=$row['township'];
      $city=$row['city'];

    $educationView_datas=$database->readAll('education');
    foreach($educationView_datas as $row){
      $semester=$row['semester'];
      $specialization=$row['specialization'];
      $degree=$row['degree'];

    $url=URLROOT;
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
										<img src='$url/public/upload_images/$img' alt='image' class='img-fluid' ><br><br>
										<i class='fa fa-envelope' aria-hidden='true'></i> $email  <br>
									
									</div>
									<div class='col-sm-6'>
										<h3 class='text-primary'>$sname</h3>
										<p class='text-secondary'>
										<strong>Father Name:</strong> $fname <br>
										<strong>Gender &nbsp;<i class='fa fa-venus-mars' aria-hidden='true'></i>:</strong> $gender <br>
										<strong>Date Of Birth:</strong>$date_of_birth <br>
										<strong>Semester :</strong>$semester <br>
										<strong>Specialization :</strong>$specialization <br>
										<strong>Degree :</strong>$degree <br>
										<br />
										<i class='fa fa-home' aria-hidden='true'> Address : </i> <strong>Addres:</strong> $blog Blog, $street Street, $township Township, $city City<br>
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
    }
  } 
	?>



<!-- Student Edit form modal-->
    <?php
    $database=new Database();
    $personal_datas=$database->readAll('register');
    foreach($personal_datas as $data){
   	$id = $data['id'];
		$sname = $data['sname'];
		$fname= $data['fname'];
		$email = $data['email'];
		$date_of_birth=$data['date_of_birth'];
    $gender=$data['gender'];
    $img = $data['image'];
    $user_id=$data['user_id'];

    $address_datas=$database->readAll('addresses');
    foreach($address_datas as $data){
    $blog=$data['blog'];
    $street=$data['street'];
    $township=$data['township'];
    $city=$data['city'];

    $education_datas=$database->readAll('education');
    foreach($education_datas as $data){
    $semester=$data['semester'];
    $specialization=$data['specialization'];
    $degree=$data['degree'];
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
                    name='sname'
                    value='$sname'
                    placeholder='Enter Your Name'  required
                  />
                </div>
                <div class='form-group col-md-6'>
                  <label for='fathername'>Father Name</label>
                  <input
                    type='text'
                    class='form-control'
                    name='fname'
                    value='$fname'
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
                    <select class='form-select' id='validationDefault04' name='gender' value='$gender' required>
                          <option selected disabled value='$gender'>$gender</option>
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
                  <select class='form-select' id='validationDefault04' name='semester' value='$semester'>
                    <option selected disabled value=''>$semester</option>
                    <option>Full Time</option>
                    <option>Part Time</option>
                  </select>
                </div>
              </div>
              <div class='row pt-3'>
                <div class='form-group col-md-6'>
                  <label for='education'>Specialization</label>
                  <select class='form-select' id='validationDefault04' name='specialization' value='$specialization'>
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
                Create
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
		";
	}
}
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
