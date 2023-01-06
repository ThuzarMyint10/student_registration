
<?php 
if (!empty($_GET['studentId'])) :
    $database=new Database();
    $data=$database->getById('vw_student', 'id', $_GET['studentId']); ?> 
   <form action="<?= URLROOT; ?>/Register/update?id=<?= $data[0]['id']?>" method="POST" enctype="multipart/form-data">
   <div class="row pt-3">
              <div class="form-group col-md-3">
                <label for="student_name">Student Name</label>
                  <input
                    value = "<?= $data[0]['name'] ?>"
                    id = "student_name"
                    type="text"
                    class="form-control"
                    name="student_name"
                    placeholder="Enter Your Name"  required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="father_name">Father Name</label>
                  <input
                  value = "<?= $data[0]['father_name'] ?>"
                    type="text"
                    class="form-control"
                    name="father_name"
                    placeholder="Enter Your Father Name" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="phone">Phone</label>
                  <input
                  value = "<?= $data[0]['phone'] ?>"
                    type="mobile"
                    class="form-control"
                    name="phone"
                    placeholder="Enter Your Phone" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="emergency_phone">Emergency Phone</label>
                  <input
                  value = "<?= $data[0]['emergency_phone'] ?>"
                    type="mobile"
                    class="form-control"
                    name="emergency_phone"
                    placeholder="Emergency Phone" 
                  />
              </div>
            </div>

            <div class="row pt-3">
              <div class="form-group col-md-3">
                <label for="email">Email</label>
                  <input
                  value = "<?= $data[0]['email'] ?>"
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Enter Your email" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="password">Password</label>
                  <input
                  value = "<?= $data[0]['password'] ?>"
                    type="text"
                    class="form-control"
                    name="password"
                    placeholder="Enter Password" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="date_of_birth">Date of Birth</label>
                  <input
                    value = "<?= $data[0]['date_of_birth'] ?>"
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                  <select class="form-select" id="gender" name="gender" value = "<?= $data['gender'] ?>" required>
                    <option value= "<?= $data[0]['gender'] ?>"><?= $data[0]['gender'] ?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option>Others</option>
                  </select>
              </div>

            </div>
             
            <div class="row pt-3"> 
               <div class="form-group col-md-6">
                <label for="city">City</label>
                  <select class="form-select" id="city_list" name="city" required onchange='GetCityIdByEdit(this.value)'>
                  <option selected="selected">Select City</option>
                    <?php 
                    $city_names = $database->readAll('city');
                    foreach ($city_names as $city) { ?>
                      <option value="<?= $city['id']; ?>" <?php if ($city['name'] == $data[0]['city_name']) {
                          echo " selected";
                      } ?>>

                      <?= $city['name']; ?>
                      </option>
                      <?php } ?>
                  
                </select>
              </div>
              <div class="form-group col-md-6">
                  <label for="townshipEdit">Township</label>
                  <select class="form-select" id="township_list_edit" name="townshipEdit" required onchange='GetTownshipIdEdit(this.value)'>                                
                    <option selected="selected">Select Township</option>  
                    <?php 
                    $township_names = $database->getById('township', 'city_id', $data[0]['city_id']);
                    
                    foreach ($township_names as $township) { ?>
                      <option value="<?= $township['id']; ?>" <?php if ($township['name'] == $data[0]['township_name']) {
                          echo " selected";
                      } ?>>

                      <?= $township['name']; ?>
                      </option>
                      <?php } ?>   
                  </select>
              </div>
            </div>

            <div class="row pt-3">
              <div class="form-group col-md-4">
                <label for="street_name">Street Name</label>
                  <select class="form-select" id="street_name_list_edit" name="street_name" required >                                
                    <option selected="selected">Select Street Name</option>  
                    <?php 
                    $street_names = $database->getById('street', 'township_id', $data[0]['township_id']);
                    
                    foreach ($street_names as $street) { ?>
                      <option value="<?= $street['id']; ?>" <?php if ($street['name'] == $data[0]['street_name']) {
                          echo " selected";
                      } ?>>

                      <?= $street['name']; ?>
                      </option>
                      <?php } ?>   
                  </select>
              </div>

              <div class="form-group col-md-4">
                <label for="block">Block</label>
                  <input
                    value="<?= $data[0]['block'] ?>"
                    type="text"
                    class="form-control"
                    name="block"
                    placeholder="Enter Your block" required
                  />
              </div>

              <div class="form-group col-md-4">
                <label for="unit">Unit</label>
                  <input
                    value="<?= $data[0]['unit'] ?>"
                    type="text"
                    class="form-control"
                    name="unit"
                    placeholder="Enter Your Unit " required
                  />
              </div>
            </div>

            <div class="row pt-3">
              <div class="form-group col-md-6">
                  <label for="achedamic">Achedamic Year</label>
                  <select class="form-select" id="achedamic_year_edit" name="achedamic" required onchange='GetAchedamicIdEdit(this.value)'>
                                      
                  <option selected="disabled" value='0'>Select Achedamic Year</option> 
                    <?php 
                     $achedamic_years = $database->readAll('achedamic_year');
                    
                    foreach ($achedamic_years as $achedamic) { ?>
                      <option value="<?= $achedamic['id']; ?>" <?php if ($achedamic['name'] == $data[0]['achedamic_year']) {
                          echo " selected";
                      } ?>>

                      <?= $achedamic['name']; ?>
                      </option>
                      <?php } ?> 
                  
                 </select>
                </div>
              
                <div class="form-group col-md-6">
                  <label for="semester">Semester</label>
                                          
    <?php
    if(empty($data[0]['semester_id'])) { 
       
        ?>
         <select class="form-select" id="semesterEdit" name="semester" disabled>   
      
        <option value="0" disabled>
        </option>
   <?php }
        else{ ?>
         <select class="form-select" id="semesterEdit" name="semester" required>   
            <option selected="selected">Select Semester</option>
            <?php        
             $semester_names = $database->readAll('semester');
                    
                    foreach ($semester_names as $semester) { ?>
                      <option value="<?= $semester['id']; ?>" <?php if ($semester['name'] == $data[0]['semester']) {
                          echo " selected";
                      } ?>>

                      <?= $semester['name']; ?>
                      </option>
                      <?php } ?> 
                      <?php } ?> 
                 </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="specialization">Specialization</label>
                  <select class="form-select" id="specialization" name="specialization" required  onchange='GetSpecializationEdit(this.value)'>
                                      
                    <option value= '0'>Select Specialization</option>
                   
                    <?php 
                     $specialization_datas = $database->readAll('subject');
                    foreach ($specialization_datas as $specialization_data) { ?>
                      <option value="<?= $specialization_data['id']." ".$specialization_data['degree']; ?>" <?php if ($specialization_data['specialization'] == $data[0]['specialization']) {
                          echo " selected";
                      } ?>>

                      <?= $specialization_data['specialization']; ?>
                      </option>
                      <?php } ?>
                   </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="degree"> degree</label>
                  <input value="<?= $data[0]['degree']; ?>" type="text" class="form-control" id="degree_edit" name="degree"  placeholder="Your Degree" required readonly/>
                </div>
              
              </div>

              <div class="row pt-3">
              <div class="form-group col-md-6">
                <label for="edit_start_date">Start Date</label>
                  <input
                    value = "<?= $data[0]['start_date'] ?>"
                    type="date"
                    class="form-control"
                    name="edit_start_date"
                    placeholder="Start Date" required
                  />
              </div>
              <div class="form-group col-md-6">
                <label for="edit_end_date">End Date</label>
                  <input  
                    value = "<?= $data[0]['end_date'] ?>"    
                    type = "date"
                    class="form-control"
                    id = "end_date"
                    name="edit_end_date"
                  />
              </div>
              
              </div>
            
              <div class='form-group pt-3'>
                <label>Image</label>
                  <input type='file' value="<?= $data[0]['image']; ?>" name='image' class='form-control' >
                  <img src = '<?= URLROOT; ?>/public/upload_images/<?= $data[0]['id']; ?>/<?= $data[0]['image']; ?>' style='width:50px; height:50px'>
              </div>
              <button
                name="submit"
                type="submit"
                class="btn button_color create mt-5 float-end"
              >
                Update
              </button>
            </form>

    <?php endif; ?> 
 <script>

$(document).ready(function(){
    GetCityIdByEdit(cityId);
    GetTownshipIdEdit(townshipId);
    GetAchedamicIdEdit(achedamicId);
    GetSpecializationEdit(subjectDatas);
});

    function GetSpecializationEdit(subjectDatas) {
      if(subjectDatas!= '0'){
      const subjectData = subjectDatas.split(" "); 
      document.getElementById("degree_edit").value = subjectData[1];
      return;
      } else{
        document.getElementById("degree_edit").value = "Your Degree";
      }
      
    }

    // Pull out township list by city id
    function GetCityIdByEdit(cityId) {
      var url = 'pages';
            var form_url = '<?= URLROOT; ?>/' + url + '/township';
            $.ajax({
                url : form_url,
                type : 'GET', 
                data : jQuery.param({cityId: cityId}) ,//parse parameter 
                success : function (townshipList) {
                    document.getElementById('township_list_edit').innerHTML = townshipList;
                    GetTownshipIdEdit(0);
                }
            });
}

// Pull out street name list by township id
function GetTownshipIdEdit(townshipId) {
      var url = 'pages';
            var form_url = '<?= URLROOT; ?>/' + url + '/street';
            $.ajax({
                url : form_url,
                type : 'GET', 
                data : jQuery.param({ townshipId: townshipId}) ,//parse parameter 
                success : function (streetNameList) {
                    document.getElementById("street_name_list_edit").innerHTML = streetNameList;
                }
            });
}

function GetAchedamicIdEdit(achedamicId){
   if(achedamicId == 6 || achedamicId == '0'){
    document.getElementById("semesterEdit").value = achedamicId;
    $('#semesterEdit').attr("disabled", true);
    $('#end_date').attr("disabled", false);
   } else{
    $('#semesterEdit').attr("disabled", false);
    $('#end_date').attr("disabled", true);
    var url = 'pages';
            var form_url = '<?= URLROOT; ?>/' + url + '/semester';
            $.ajax({
                url : form_url,
                success : function (semesterList) {
                    document.getElementById("semesterEdit").innerHTML = semesterList;
                }
            });
   }
 
}
</script>
 