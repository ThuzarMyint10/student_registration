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
        <?php 
        $database=new Database();
        $id = base64_decode($_SESSION['id']);
        $admin=$database->getById('student', 'id', $id);
        ?>
        Welcome <?php echo $admin['name']; ?>
      </div>
      </div>
      
      <hr class="divided" />
      <a href="#" class=" button_color"
        ><i class="fa fa-arrow-circle-left"></i> Log out</a
      >
      <a
        class="btn button_color"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
      >
        <i class="fa fa-plus"></i> Add New Student
      </a>
      <button onclick="window.print()" class=" button_color float-end">Print PDF</button>
      
      <hr class="divided" />
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">S.L</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Student Id</th>
            <th class="text-center" scope="col">Email</th>
            <th class="text-center" scope="col"> Date Of Birth</th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php 
         
          try{
            $database=new Database();
            $run_datas=$database->readAll('student');
            $i=0;
            foreach($run_datas as $row){ ?>
            <tr>
            <td class="text-center"><?php echo ++$i; ?></td>
            <td class="text-left"><?php echo $row['name'];?></td>
            <td class="text-left"><?php echo $row['id'];?></td>
            <td class="text-left"><?php echo $row['email'];?></td>
            <td class="text-center"><?php echo $row['date_of_birth']; ?></td>
            <td class="text-center">
              <span>
                <a
                  href="#view<?= $row['id'] ?>"
                  class="btn btn-success mr-3 profile"
                  data-bs-toggle="modal"
                  title="Profile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span><a
                  href="#edit<?= $row['id'] ?>"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="<?php echo URLROOT; ?>/Register/destroy?id=<?= $row['id'] ?>" class="btn btn-danger deleteuser" title="Delete" onclick="return confirm('Are you sure?')">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
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
    </div>
  

    <?php require APPROOT . '/views/inc/footer.php'; ?>

    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });

      
      
    </script>

