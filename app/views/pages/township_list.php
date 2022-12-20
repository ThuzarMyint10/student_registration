
 <?php
 $database = new Database();
 if (!empty($_GET['cityId'])) {
        
     $cityId = $_GET['cityId'];
     $township_names = $database->getById('township', 'city_id', $cityId);
    
     ?>
	<option value="">Select Township</option>
<?php foreach ($township_names as $township) { ?>
	<option value="<?php echo $township['id']; ?>"><?php echo $township[
    'name'
]; ?></option>
<?php }
 }
 