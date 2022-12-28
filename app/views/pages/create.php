<!-- Student Create form modal-->

<?php $database = new Database();?>


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
            
            <div class="row pt-3">
              <div class="form-group col-md-6">
                <label for="student_name">Student Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="student_name"
                    placeholder="Enter Your Name"  required
                  />
              </div>

              <div class="form-group col-md-6">
                <label for="father_name">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="father_name"
                    placeholder="Enter Your Father Name" required
                  />
              </div>

            </div>

            <div class="row pt-3">
              <div class="form-group col-md-3">
                <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="email"
                    placeholder="Enter Your email" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="password">Password</label>
                  <input
                    type="text"
                    class="form-control"
                    name="password"
                    placeholder="Enter Password" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="date_of_birth">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth" required
                  />
              </div>

              <div class="form-group col-md-3">
                <label for="gender">Gender</label>
                <?php $genderArray = ['Male','Female']?>
                  <select class="form-select" id="gender" name="gender" required>
                    <option selected disabled value="">Choose...</option>
                  <?php   foreach ($genderArray as $gender) {
                            // $city_name = $city['name'];
                            // $city_id = $city['id'];
                            echo "<option value=$gender>$gender</option>";
                        }
                        ?>
                  </select>
              </div>

            </div>
             
            <div class="row pt-3"> 
               <div class="form-group col-md-6">
                <label for="city">City</label>
                  <select class="form-select" id="city_list" name="city" required onchange='GetCityId(this.value)'>
                                      
                   <option selected="selected">Select City</option>
                    <?php
                    $city_names = $database->readAll('city');
                    if ($city_names) {
                        foreach ($city_names as $city) {
                            $city_name = $city['name'];
                            $city_id = $city['id'];
                            echo "<option value=$city_id>$city_name</option>";
                        }
                    } else {
                        echo "<option value=''> </option>";
                    }
                    ?>
                </select>
              </div>

              <div class="form-group col-md-6">
                  <label for="township">Township</label>
                  <select class="form-select" id="township_list" name="township" required onchange='GetTownshipId(this.value)'>                                
                    <option selected="selected">Select Township</option>     
                  </select>
              </div>
            </div>

            <div class="row pt-3">
              <div class="form-group col-md-4">
                <label for="street_name">Street Name</label>
                  <select class="form-select" id="street_name_list" name="street_name" required >                                
                    <option selected="selected">Select Street Name</option>     
                  </select>
              </div>

              <div class="form-group col-md-4">
                <label for="block">Block</label>
                  <input
                    type="text"
                    class="form-control"
                    name="block"
                    placeholder="Enter Your block" required
                  />
              </div>

              <div class="form-group col-md-4">
                <label for="unit">Unit</label>
                  <input
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
                  <select class="form-select" id="achedamic_year" name="achedamic" required onchange='GetAchedamicId(this.value)'>
                                      
                  <option selected="disabled" value='0'>Select Achedamic Year</option>
                    <?php
                    $achedamic_years = $database->readAll('achedamic_year');
                    if ($achedamic_years) {
                        foreach ($achedamic_years as $achedamic) {
                            $achedamic_year = $achedamic['name'];
                            $achedamic_id = $achedamic['id'];
                            echo "<option value=$achedamic_id>$achedamic_year</option>";
                        }
                    } else {
                            echo "<option value=''>There is no data</option>";
                    }
                    ?>
                 </select>
                </div>
              
                <div class="form-group col-md-6">
                  <label for="semester">Semester</label>
                  <select class="form-select" id="semester" name="semester" required>
                                      
                  <option selected="disabled">Choose one</option>
                   
                 </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="specialization">Specialization</label>
                  <select class="form-select" id="specialization" name="specialization" required  onchange='GetSpecialization(this.value)'>
                                      
                    <option selected="disabled" value= '0'>Choose one</option>
                    <?php
                    $specialization_datas = $database->readAll('subject');
                    if ($specialization_datas) {
                        foreach ($specialization_datas as $data) {
                            $specialization_data = $data['specialization'];
                            $id = $data['id'];
                            $degree = $data['degree'];
                            echo '<option value="'.$id.' '.$degree.'">'.$specialization_data.'</option>';
                        }
                    } else {
                        foreach ($specialization_datas as $data) {
                            echo "<option value='strtolower('meet')'>meet</option>";
                        }
                    }
                    ?>
                   </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="education"> degree</label>
                  <input type="text" class="form-control" id="degree" name="degree"  placeholder="Your Degree" required readonly/>
                </div>
              
              </div>
              <div class="form-group pt-3">
                <label>Image</label>
                <input type="file" name="profile_image" class="form-control" required/>
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
  $(document).ready(function(){
    GetCityId(cityId);
    GetTownshipId(townshipId);
    GetAchedamicId(achedamicId);
    GetSpecialization(subjectDatas);

});
  function GetSpecialization(subjectDatas) {
    if(subjectDatas!= '0'){
      const subjectData = subjectDatas.split(" "); 
      document.getElementById("degree").value = subjectData[1];
      return;
      } else{
        document.getElementById("degree").value = "Your Degree";
      }
      
    }

    // Pull out township list by city id
    function GetCityId(cityId) {
      var url = 'pages';
            var form_url = '<?php echo URLROOT; ?>/' + url + '/township';
            $.ajax({
                url : form_url,
                type : 'GET', 
                data : jQuery.param({ cityId: cityId}) ,//parse parameter 
                success : function (townshipList) {
                    document.getElementById("township_list").innerHTML = townshipList;
                    GetTownshipId(0);
                }
            });
}

// Pull out street name list by township id
function GetTownshipId(townshipId) {
      var url = 'pages';
            var form_url = '<?php echo URLROOT; ?>/' + url + '/street';
            $.ajax({
                url : form_url,
                type : 'GET', 
                data : jQuery.param({ townshipId: townshipId}) ,//parse parameter 
                success : function (streetNameList) {
                    document.getElementById("street_name_list").innerHTML = streetNameList;
                }
            });
}

function GetAchedamicId(achedamicId){
   if(achedamicId == 6 || achedamicId == '0'){
    document.getElementById("semester").value = achedamicId;
    $('#semester').attr("disabled", true);
   } else{
    $('#semester').attr("disabled", false);
    var url = 'pages';
            var form_url = '<?php echo URLROOT; ?>/' + url + '/semester';
            $.ajax({
                url : form_url,
                success : function (semesterList) {
                    document.getElementById("semester").innerHTML = semesterList;
                }
            });
   }
 
}

</script>