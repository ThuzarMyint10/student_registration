
	<?php if (!empty($_GET['studentId'])):

     $database = new Database();
     $data = $database->getById('vw_student', 'id', $_GET['studentId']);
     $performance_data = $database->getById(
         'performance',
         'id',
         $data[0]['performance_id']
     );
     // Personal Info
     $id = $data[0]['id'];
     $studentName = $data[0]['name'];
     $fatherName = $data[0]['father_name'];
     $email = $data[0]['email'];
     $phone = $data[0]['phone'];
     $emergency_phone = $data[0]['emergency_phone'];
     $dateOfBirth = $data[0]['date_of_birth'];
     $gender = $data[0]['gender'];
     $image = $data[0]['image'];
     // Address Info
     $block = $data[0]['block'];
     $unit = $data[0]['unit'];
     $street = $data[0]['street_name'];
     $township = $data[0]['township_name'];
     $city = $data[0]['city_name'];
     // Education Info
     $semester = $data[0]['semester'];
     $specialization = $data[0]['specialization'];
     $degree = $data[0]['degree'];
     $achedamic_year = $data[0]['achedamic_year'];
     $performance = $performance_data[0]['name'];
     $status_id = $data[0]['status_id'];
     $address_id = $data[0]['address_id'];
     $start_date = $data[0]['start_date'];
     $end_date = $data[0]['end_date'];
     $url = URLROOT;
     ?> 
 
 	<div class='modal-header'>
		<h5 class='modal-title'>Profile  <i class='fa-solid fa-user'></i>
		</h5>
		<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'>
		</button>
	</div>
	<div class='modal-body view-body'>
		<div class='container' id='profile'> 
			<div class='row'>
				<div class='col-sm-6'>
					<img src="<?= URLROOT ?>/public/upload_images/<?= $id ?>/<?= $image ?>" alt='image' class='img-fluid' ><br><br>
					<strong>Phone :</strong> <?= $phone ?> <br>
					<strong>Emergency :</strong> <?= $emergency_phone ?> <br>
					<i class='fa fa-envelope' aria-hidden='true'></i> <?= $email ?>  <br>
					<strong>StartDate :</strong> <?= $start_date ?> <br>
					<strong>EndDate :</strong><?php if (
         $end_date == '0000-00-00'
     ): ?> Present <?php else: ?> <?= $end_date ?> <?php endif; ?> <br>
									
				</div>
				<div class='col-sm-6'>
					<h3 class='text-primary'><?= $studentName ?></h3>
					<p class='text-secondary'>
					<strong>Father Name :</strong> <?= $fatherName ?><br>
					<strong>Gender &nbsp;<i class='fa fa-venus-mars' aria-hidden='true'></i> :</strong> <?= $gender ?> <br>
					<strong>Date Of Birth :</strong> <?= $dateOfBirth ?><br>
					<strong>Performance :</strong> <?= $performance ?> <br>
					<strong>Achedamic Year :</strong> <?= $achedamic_year ?> <br>
					<strong>Semester :</strong> <?= $semester ?> <br>
					<strong>Specialization :</strong> <?= $specialization ?> <br>
					<strong>Degree :</strong> <?= $degree ?><br>
					<br />
					<i class='fa fa-home' aria-hidden='true'> </i> <strong>Addres :</strong> <?= $block ?> Block, <?= $unit ?> Unit, <?= $street ?>, <?= $township ?> Township, <?= $city ?> City<br>
					<i class="fa fa-map-marker" aria-hidden="true"></i>
					<a href="<?= URLROOT ?>/pages/map">Click here !!</a>
				</div>
			</div>   
		</div>
	</div>
	<div class='modal-footer'>
		 <a
		 	href = "<?php echo URLROOT; ?>/pages/payment?paymentId=<?= $id ?>"
        	class="btn button_color"
        	type="button"
        	id = "pay_fee"
      		>
         Payment
      	</a>
		<button type='button' class='btn button_color' data-bs-dismiss='modal'>Close</button>
	</div>
						
	<?php require APPROOT . '/views/inc/footer.php'; ?>

	<?php
 endif; ?> 
