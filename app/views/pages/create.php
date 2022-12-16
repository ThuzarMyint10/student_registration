<!-- Student Create form modal-->

<?php $database = new Database();
// $cities_id;

// function cityId($str)
// {
//     // if (session_id() == '') {
//     //     // session_start() creates a session or resumes the current one based on a session identifier passed via a GET or POST request, or passed via a cookie.
//     //     session_start();
//     // }
//     session_start();
//     $_SESSION['cities_id'] = $str;
// }
?>
<h1><?php echo $GLOBALS['cities_id']; ?></h1>

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
                    name="name"
                    placeholder="Enter Your Name"  required
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="father_name"
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
                <div class="form-group col-md-3">
                  <label for="inputPassword4">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth" required
                  />
                </div>
                 <div class="form-group col-md-3">
                  <label for="inputState">Gender</label>
                    <select class="form-select" id="validationDefault04" name="gender" required>
                          <option selected disabled value="">Choose...</option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Others</option>
                      </select>
                  </div>
              </div>
             
              <div class="row pt-3">
               
                <div class="form-group col-md-6">
                  <label for="city">City</label>
            <select class="form-select" id="city_list" name="city[]" required onchange='GetCityId(this.value)'>
                                      
               <option selected="selected">Choose one</option>
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
            <select class="form-select" id="township_list" name="township[]" required>
                                              
               <option selected="selected">Choose one</option>
                   
            </select>
                </div>
               
              </div>
               <div class="row pt-3">
                <div class="form-group col-md-4">
                  <label for="address">Street Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="street_name"
                    placeholder="Enter Your street name " required
                  />
                </div>
               <div class="form-group col-md-4">
                  <label for="address">Blog</label>
                  <input
                    type="text"
                    class="form-control"
                    name="blog"
                    placeholder="Enter Your blog " required
                  />
                </div>
               <div class="form-group col-md-4">
                  <label for="address">Unit</label>
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
                  <label for="education">Semester</label>
                  <select class="form-select" id="validationDefault04" name="semester" required>
                                      
                  <option selected="selected">Choose one</option>
                    <?php
                    $semester_datas = $database->readAll('semester');
                    if ($semester_datas) {
                        foreach ($semester_datas as $data) {
                            $semester_data = $data['name'];
                            $semester_id = $data['id'];
                            echo "<option value=$semester_id>$semester_data</option>";
                        }
                    } else {
                        foreach ($semester_datas as $data) {
                            echo "<option value='strtolower('meet')'>meet</option>";
                        }
                    }
                    ?>
                 </select>
                </div>
              
                <div class="form-group col-md-3">
                  <label for="education">Specialization</label>
                  <select class="form-select" id="validationDefault04" name="subject" required  onchange='GetDetail(this.value)'>
                                      
                    <option selected="selected">Choose one</option>
                    <?php
                    $specialization_datas = $database->readAll('subject');
                    if ($specialization_datas) {
                        foreach ($specialization_datas as $data) {
                            $specialization_data = $data['specialization'];
                            $degree = $data['id'];
                            echo "<option value=$degree>$specialization_data</option>";
                        }
                    } else {
                        foreach ($specialization_datas as $data) {
                            echo "<option value='strtolower('meet')'>meet</option>";
                        }
                    }
                    ?>
                   </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="education"> degree</label>
                  <input type="text" class="form-control" id="degree" name="degree"  placeholder="Enter Your Degree" required/>
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
  $cities_id = 1;
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

  
 function GetCityId(str) {
  // alert(str);
        // var str='';
        // var cityList=document.getElementById('city_list');
        // for (i=0;i< cityList.length;i++) { 
        //     if(cityList[i].selected){
        //         str += cityList[i].value + ','; 
        //     }
        // }         
        // var str=str.slice(0,str.length -1);
//         $.ajax({
//   url: "township_list.php",
//   data: 'city_id='+str,
//   context: document.body
// }).done(function(data) {
//   $("#township_list").html(data);
// });
	$.ajax({          
        	type: "POST",
        	url: "township_list.php",
        	data: {
            get_option:str
          },
        	success: function(data){
        		// $("#township_list").html(data);
            document.getElementById("township_list").innerHTML = data;
        	}
	});
}

</script>