
	<?php if (!empty($_GET['studentId'])) :

		$database=new Database();
		$data=$database->getById('vw_student', 'id', $_GET['studentId']); 
		// Personal Info
		$id = $data[0]['id'];
		$studentName = $data[0]['name'];
		$fatherName = $data[0]['father_name'];
		$email = $data[0]['email'];
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

		$status_id = $data[0]['status_id'];
		$address_id = $data[0]['address_id'];
		$url=URLROOT;
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
					<img src="<?= URLROOT; ?>/public/upload_images/<?= $id?>/<?= $image?>" alt='image' class='img-fluid' ><br><br>
					<i class='fa fa-envelope' aria-hidden='true'></i> <?= $email ?>  <br>
									
				</div>
				<div class='col-sm-6'>
					<h3 class='text-primary'><?= $studentName ?></h3>
					<p class='text-secondary'>
					<strong>Father Name:</strong><?= $fatherName ?><br>
					<strong>Gender &nbsp;<i class='fa fa-venus-mars' aria-hidden='true'></i>:</strong> <?=$gender?> <br>
					<strong>Date Of Birth:</strong><?= $dateOfBirth ?><br>
					<strong>Semester :</strong><?= $semester ?> <br>
					<strong>Specialization :</strong><?= $specialization ?> <br>
					<strong>Degree :</strong><?= $degree ?><br>
					<br />
					<i class='fa fa-home' aria-hidden='true'> </i> <strong>Addres:</strong> <?= $block ?> Block, <?= $unit ?> Unit, <?= $street ?>, <?= $township ?> Township, <?= $city ?> City<br>
				</div>
			</div>   
		</div>
	</div>
	<div class='modal-footer'>
		<button type='button' class='btn button_color' data-bs-dismiss='modal'>Close</button>
	</div>
						
	<?php require APPROOT . '/views/inc/footer.php'; ?>

	<?php endif; ?> 
