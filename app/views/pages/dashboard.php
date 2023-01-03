<?php require_once APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/components/auth_message.php'; ?>
<?php require  APPROOT.'/views/pages/create.php';?>
<?php require  APPROOT.'/views/pages/view.php';?>
<?php require  APPROOT.'/views/pages/edit.php';?>

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
       
      </div>
      </div>
      
    <!-- for chart -->
    <?php
    $datas=$database->readAllByFilter('vw_student');
    foreach($datas as $data){
      $month[]=$data['month'];
      $count[]=$data['count'];
    }
    ?>
    <div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg">
                <h5>The Student Registration</h5>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
      </div>
    </div>
    <script>
  Chart.defaults.font.size = 14;
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: 'Students',
      data: <?php echo json_encode($count) ?>,
      backgroundColor: [
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
        'rgb(95, 94, 158)',
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        x:{
          title:{
            display:true,
            text:'months'
          }
        },
        y: {
          beginAtZero: true,
          title:{
            display:true,
            text:'percentages %'
          }
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
    </script>
   <!-- end for chart -->

      <?php if(isset($_SESSION['id'])) :  $database=new Database();
            $id = base64_decode($_SESSION['id']);
            $admin=$database->getById('student', 'id', $id); ?>
      <hr class="divided" />
      <a href="<?php echo URLROOT; ?>/auth/logout" class=" button_color"
        ><i class="fa fa-arrow-circle-left"></i> Log out</a
      >
      <?php if($admin[0]['user_type_id'] == ADMIN_ID) : ?>
      <a
        class="btn button_color"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
      >
        <i class="fa fa-plus"></i> Add New Student
      </a>

      <?php endif; ?>
      <button onclick="window.print()" class=" button_color float-end">Print PDF</button>
      
      <hr class="divided" />
      <?php require APPROOT . '/views/components/auth_message.php'; ?>
     
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">S.L</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Student Id</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col"> Performance </th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
            <?php if($admin[0]['user_type_id'] == ADMIN_ID) : ?>
            <th class="text-center" scope="col">Status</th>
            <?php endif; ?>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          try{
           
            if($admin[0]['user_type_id'] == NORMAL_USER_ID){
            $run_datas=$admin;
           } else{
           
            $run_datas=$database->readAll('student');
            
           }
            
            $i=0;
            foreach($run_datas as $row){ ?>
            <tr>
            <td class="text-center"><?php echo ++$i; ?></td>
            <td class="text-left"><?php echo $row['name'];?></td>
            <td class="text-left"><?php echo $row['id'];?></td>
            <td class="text-left"><?php echo $row['email'];?></td>
           
            <td class="text-left">
            <select class="form-select" style = "border:none; background-color:#dbdced; focus:none; box-shadow:none;" id="performance_list" name="performance" required onchange='GetPerformance(this.value)'>                                
            <?php 
            $performance = $database->getById('performance', 'id', $row['performance_id']);
            
            $performanceNames = $database->readAll('performance');
            foreach ($performanceNames as $performanceName) { ?>
              <option value="<?= $performanceName['id'] .' '.$row['id']; ?>" <?php if ($performanceName['name'] == $performance[0]['name']) {
                  echo " selected";
              } ?>>

              <?= $performanceName['name']; ?>
              </option>
              <?php } 

            ?>
                  </select>
            </td>
            <td class="text-center">
              <span>
                <a
                 
                  class="btn btn-success mr-3 profile"
                  data-bs-toggle="modal"
                  title="Profile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span><a   
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            
            <td class='text-center'>    
              <a href="" class="btn btn-danger delete_btn_ajax">
              <i class="fa-solid fa-trash"></i></a>
            </td>
          
            <?php    if($admin[0]['user_type_id'] == ADMIN_ID) : ?>
              <td class='text-center'>
                <?php 
                  $status=$database->getById('status', 'id', $row['status_id']); 
                ?>
                <?php if($row['user_type_id'] == ADMIN_ID) : ?> 
                <div class="btn text-bg-danger" style = "width:120px">
               
                <?php elseif($row['status_id'] == 1):?>
                <div class="btn status text-bg-success" style = "width:120px">
             
                <?php else: ?>
                <div class="btn status text-bg-warning" style = "width:120px">
                <?php endif;?>

                <?php if($status[0]['name'] == 'active'): ?>
                suspend
                <?php else: ?>
                active
                <?php endif;?>
                </div>
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
      <?php else : ?>
        <div class="container">
  <h1>Student Registration Page</h1>
  <p>This part is need to login if you wanna see some data.</p> 
</div>
      <?php endif; ?>
     

    </div>
  

    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <div class="modal fade" id="edit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <img src="<?= URLROOT; ?>/images/logo1.png"      
             width="150px" height="150px" alt="" />
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
          <div class="modal-body edit-body">
            
          </div>
        </div>
      </div>
    </div>


    <!-- for View -->

    <div class='modal fade' id='view' >
					<div class='modal-dialog modal-dialog-lg'>
						<div class='modal-content view-body-content'>
					
						</div>
					</div>
				</div> 

    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
       
        $('.profile').on('click', function () {

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            var url = 'pages';
            var form_url = '<?php echo URLROOT; ?>/' + url + '/viewpage';
              $.ajax({
                  url : form_url,
                  type : 'GET', 
                  data : jQuery.param({studentId: data[2]}) ,//parse parameter 
                  success : function (resp) {
                    $('.view-body-content').html(resp);
                    $("#view").modal('show');
                  }      
              });
          });
        });
            
        $('.edituser').on('click', function () {

         $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
             return $(this).text();
          }).get();

              var url = 'pages';
              var form_url = '<?php echo URLROOT; ?>/' + url + '/edit';
                $.ajax({
                    url : form_url,
                    type : 'GET', 
                    data : jQuery.param({studentId: data[2]}) ,//parse parameter 
                    success : function (resp) {
                      $('.edit-body').html(resp);
                      $("#edit").modal('show');
                    }      
              });
         });

        // For Sweet Alert
       $('.delete_btn_ajax').click(function(e){
          e.preventDefault();
          $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();

        var deleteid = data[2];
        var url = 'pages';
             var form_url = '<?php echo URLROOT; ?>/' + url + '/delete';
        
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "GET",
            url: form_url,
            data: {
              "delete_btn_set": 1,
              "id": deleteid,
            },
            
            success: function(response){
              swal("Data Deleted Successfully!", {
                icon: "success",
              }).then((result) => {
                location.reload();
              });
            }
          })
        } 
        });
      });
     
//  For Suspended
$('.status').on('click', function (e) {
  e.preventDefault(); 
  $tr = $(this).closest('tr');

 var data = $tr.children("td").map(function () {
   return $(this).text();
 }).get();

 var form_url = '<?= URLROOT; ?>/Register/updateStatus';

        $('.profile').on('click', function () {

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            var url = 'pages';
            var form_url = '<?php echo URLROOT; ?>/' + url + '/viewpage';
              $.ajax({
                  url : form_url,
                  type : 'GET', 
                  data : jQuery.param({studentId: data[2]}) ,//parse parameter 
                  success : function (resp) {
                    $('.view-body-content').html(resp);
                    $("#view").modal('show');
                  }      
              });
          });
        });
            
        $('.edituser').on('click', function () {

         $tr = $(this).closest('tr');

          var data = $tr.children("td").map(function () {
             return $(this).text();
          }).get();

              var url = 'pages';
              var form_url = '<?php echo URLROOT; ?>/' + url + '/edit';
                $.ajax({
                    url : form_url,
                    type : 'GET', 
                    data : jQuery.param({studentId: data[2]}) ,//parse parameter 
                    success : function (resp) {
                      $('.edit-body').html(resp);
                      $("#edit").modal('show');
                    }      
              });
         });

        // For Sweet Alert
       $('.delete_btn_ajax').click(function(e){
          e.preventDefault();
          $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function () {
          return $(this).text();
        }).get();

        var deleteid = data[2];
        var url = 'pages';
             var form_url = '<?php echo URLROOT; ?>/' + url + '/delete';
        
        swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Data!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            type: "GET",
            url: form_url,
            data: {
              "delete_btn_set": 1,
              "id": deleteid,
            },
            
            success: function(response){
              swal("Data Deleted Successfully!", {
                icon: "success",
              }).then((result) => {
                location.reload();
              });
            }
          })
        } 
        });
      });
     
//  For Suspended
$('.status').on('click', function (e) {
  e.preventDefault(); 
  $tr = $(this).closest('tr');

 var data = $tr.children("td").map(function () {
   return $(this).text();
 }).get();

 var form_url = '<?= URLROOT; ?>/Register/updateStatus';

swal({
title: "Are you sure?",
text: "Do you wanna change status!",
icon: "warning",
buttons: true,
dangerMode: true,
}).then((willChange) => {
if (willChange) {
$.ajax({
 type: "POST",
 url: form_url,

 data: {
 "id": data[2],
 },

 success: function(response){
 swal("Change Status Successfully!", {
   icon: "success",
 }).then((result) => {
   location.reload();
 });}

});
}
});
         });
        // End of Suspended

        function GetPerformance(performanceDatas) {
          
          const performanceData = performanceDatas.split(" ");
          var id = performanceData[1];
          var performance_id = performanceData[0];
          var form_url = '<?= URLROOT; ?>/Register/updatePerformance';
          

            $.ajax({
                url : form_url,
                type : 'POST', 
                data : jQuery.param({ "performanceId": performance_id, "id": id,}) ,//parse parameter 
                success : function (performanceList) {
                 
                }
            });
}
    </script>

