
 <option value="">Select Street Name</option>
 <?php
 $database = new Database();
 if (!empty($_GET['townshipId'])) {
        
     $townshipId = $_GET['townshipId'];
     $street_names = $database->getById('street', 'township_id', $townshipId);
    
     ?>
	
<?php foreach ($street_names as $street_name) { ?>
	<option value="<?php echo $street_name['id']; ?>"><?php echo $street_name[
    'name'
]; ?></option>
<?php }
 }
 