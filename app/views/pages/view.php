<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>
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

<?php require APPROOT . '/views/inc/footer.php'; ?>