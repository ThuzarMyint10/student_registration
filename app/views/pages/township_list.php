 <?php
 require_once 'DBController.php';
 $db_handle = new DBController();
 if (!empty($_GET['country_id'])) {

     $coun_id = $_GET['country_id'];
     $query = "SELECT * FROM states WHERE countryID IN ($coun_id)";
     $results = $db_handle->runQuery($query);
     ?>
	<option value="">Select State</option>
<?php foreach ($results as $state) { ?>
	<option value="<?php echo $state['id']; ?>"><?php echo $state[
    'name'
]; ?></option>
<?php }
 }
 ?>
 
 <?php
 //  $database = new Database();
 //  if (isset($_GET['ajax'])) {
 //      echo 'Hello';
 //      exit();
 //  } else {
 //      echo 'Bye';
 //  }
 //  if (!empty($_GET['city_id'])) {
 //      $cityId = $_POST['city_id'];
 //      echo $cityId;
 //      //  exit();
 //      $township_names = $database->getByCityId('township', 1);
 //      if ($township_names) {
 $township_names = ['yangon', 'mandalay', 'naypyitaw'];
 foreach ($township_names as $township) {
     //  $township_name = $township['name'];
     //  $township_id = $township['id'];
     echo "<option value=$township>$township</option>";
 }
 //  } else {
 //      echo "<option value=''>hello </option>";
 //  }
 //  } else {
 //      echo 'hello';
 //  }
 //  }

?>
