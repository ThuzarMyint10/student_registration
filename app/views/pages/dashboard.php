
<?php require_once APPROOT . '/views/inc/header.php'; ?>

<!DOCTYPE html>
<html>
  <head>
    <title>Student Crud Operation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    
    <!--Fontawesome-->
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="bootstrap/css/jquery.dataTables.min.css" />
  </head>
  <body class="bg-color">
    <div class="container">
      <div class="row">
        <div class="col-4 col-md-3 col-lg-2 float-start">
          <img src="img/logo1.png" alt="" class="img-fluid" />
        </div>
        <div class="col-8 col-md-9 col-lg-10 ps-0 ms-0">
          <h3 class="pt-5 pt-md-5 ps-0 ms-0">Acadamy</h3>
          <small class="ps-0 ms-0">Let's Learn & Share Together!</small>
        </div>
      </div>
      <hr class="divided" />
      <a href="<?php echo URLROOT; ?>/auth/logout" class="btn button_color"
        ><i class="fa fa-arrow-circle-left"></i> Log out</a
      >
      <button
        class="btn button_color"
        type="button"
        data-bs-toggle="modal"
        data-bs-target="#myModal"
      >
        <i class="fa fa-plus"></i> Add New Student
      </button>
      <a href="#" class="btn button_color float-end">
        <i class="fa-solid fa-print"></i> Print PDF
      </a>
      <hr class="divided" />
      <table class="table table-striped" id="myTable">
        <thead>
          <tr>
            <th class="text-center" scope="col">S.L</th>
            <th class="text-center" scope="col">Name</th>
            <th class="text-center" scope="col">Student Id</th>
            <th class="text-center" scope="col">Phone</th>
            <th class="text-center" scope="col">User Id</th>
            <th class="text-center" scope="col">View</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="text-center">1</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">2</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">3</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">4</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">5</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">6</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">7</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">8</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">9</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">10</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">11</td>
            <td class="text-left">Mu Mu</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
          <tr>
            <td class="text-center">12</td>
            <td class="text-left">Kyaw Kyaw</td>
            <td class="text-left">9806</td>
            <td class="text-left">09-9567890</td>
            <td class="text-center">01234</td>
            <td class="text-center">
              <span>
                <a
                  href="#"
                  class="btn btn-success mr-3 profile"
                  data-toggle="modal"
                  title="Prfile"
                  ><i class="fa-regular fa-eye"></i
                ></a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a
                  href="#myModalEdit"
                  class="btn btn-warning mr-3 edituser"
                  data-bs-toggle="modal"
                  title="Edit"
                  ><i class="fa-solid fa-pen-to-square"></i>
                </a>
              </span>
            </td>
            <td class="text-center">
              <span>
                <a href="#" class="btn btn-danger deleteuser" title="Delete">
                  <i class="fa-solid fa-trash"></i>
                </a>
              </span>
            </td>
          </tr>
        </tbody>
      </table>

      <a href="#" class="btn button_color mt-3">
        <i class="fa-solid fa-file-excel"></i> Export Data
      </a>

      <!-- <form method="post" action="#">
			<input type="submit" name="export" class="btn button-color" value="Export Data" />
		</form> -->
    </div>
    <!-- Student Create form modal-->
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
                    name="sname"
                    placeholder="Enter Your Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder="Enter Your Father Name"
                  />
                </div>
              </div>
              <div class="row pt-3" style="color: #5f5e9e">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="mobile"
                    placeholder="Enter Your email"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="aadharno">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    name="address"
                    placeholder="Enter Your Address "
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                  <select
                    id="inputState"
                    name="gender"
                    class="form-control"
                  >
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputCity">Subject</label>
                  <!-- <input type="text" class="form-control" name="dist"> -->
                  <select name="subject" class="form-control">
                    <option selected>Choose...</option>
                    <option value="#">Computer Science</option>
                    <option value="Andaman and Nicobar Islands">
                      Information Technology
                    </option>
                    <option value="Arunachal Pradesh">
                      Computer Architecture
                    </option>
                    <option value="Assam">Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Specialization</label>
                  <select name="specialization" class="form-control">
                    <option selected>Choose...</option>
                    <option value="Andhra Pradesh">Computer Science</option>
                    <option value="Andaman and Nicobar Islands">
                      Information Technology
                    </option>
                    <option value="Arunachal Pradesh">
                      Computer Architecture
                    </option>
                    <option value="Assam">Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Degree</label>
                  <input type="text" class="form-control" name="degree" />
                </div>
              </div>
              <div class="form-group pt-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
              </div>
              <!-- <input type="submit" name="submit" class="btn button-color w-25 h-25" value="Submit"> -->
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
    <!-- Student Edit form modal-->
    <div class="modal fade" id="myModalEdit">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <img name="image" src="<?php echo URLROOT; ?>/images/logo1.png" width="150px" height="150px" alt="" />
            <br />
            <h3 class="im-container" id="staticBackdropLabel">
              Student Edition Form
            </h3>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="row" style="font-weight: bold">
                <div class="form-group col-md-6">
                  <label for="studentname">Student Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="sname"
                    placeholder="Enter Your Name"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="fathername">Father Name</label>
                  <input
                    type="text"
                    class="form-control"
                    name="fname"
                    placeholder="Enter your father Name"
                  />
                </div>
              </div>
              <div class="row pt-3" style="color: #5f5e9e !important">
                <div class="form-group col-md-6">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    name="mobile"
                    placeholder="Enter Your Email"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="aadharno">Address</label>
                  <input
                    type="text"
                    class="form-control"
                    name="#"
                    placeholder="Enter your Address "
                  />
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Date of Birth</label>
                  <input
                    type="date"
                    class="form-control"
                    name="date_of_birth"
                    placeholder="Date of Birth"
                  />
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Gender</label>
                  <select
                    id="inputState"
                    name="gender"
                    class="form-control"
                  >
                    <option selected>Choose...</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>
              </div>
              <div class="row pt-3">
                <div class="form-group col-md-6">
                  <label for="inputCity">Subject</label>
                  <!-- <input type="text" class="form-control" name="dist"> -->
                  <select name="subject" class="form-control">
                    <option selected>Choose...</option>
                    <option value="#">Computer Science</option>
                    <option value="Andaman and Nicobar Islands">
                      Information Technology
                    </option>
                    <option value="Arunachal Pradesh">
                      Computer Architecture
                    </option>
                    <option value="Assam">Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="inputState">Specialization</label>
                  <select name="specialization" class="form-control">
                    <option selected>Choose...</option>
                    <option value="Andhra Pradesh">Computer Science</option>
                    <option value="Andaman and Nicobar Islands">
                      Information Technology
                    </option>
                    <option value="Arunachal Pradesh">
                      Computer Architecture
                    </option>
                    <option value="Assam">Tele Communication</option>
                  </select>
                </div>
                <div class="form-group col-md-2">
                  <label for="inputZip">Degree</label>
                  <input type="text" class="form-control" name="degree" />
                </div>
              </div>
              <div class="form-group pt-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" />
              </div>
              <!-- <input type="submit" name="submit" class="btn button-color w-25 h-25" value="Submit"> -->
              <button type="submit" class="btn button_color mt-5 float-end">
                Edit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script src="fontawesome/js/all.min.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="bootstrap/js/jquery.dataTables.min.js"></script>

    <script>
      $(document).ready(function () {
        $("#myTable").DataTable();
      });
    </script>
  </body>
</html>
