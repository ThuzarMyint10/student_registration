<?php require_once APPROOT . '/views/inc/header.php'; ?>

<?php 
if (!empty($_GET['paymentId'])) :
    $database=new Database();
    
    $date = date('d-m-y');
    $data = $database->getById('vw_student', 'id', $_GET['paymentId']); ?> 
  
    <div class="container">
      <div class="row">
        <div class="col-4 col-md-3 col-lg-2 float-start">
          <img src="<?php echo URLROOT; ?>/images/logo1.png" alt="" class="img-fluid" />
        </div>
        <div class="col-6 col-md-9 col-lg-10 ps-0 ms-0">
          <h3 class="pt-5 pt-md-5 ps-0 ms-0">Acadamy</h3>
          <small class="ps-0 ms-0">Let's Learn & Share Together!</small>
        </div>
      
      <form action="<?php echo URLROOT;?>/Register/paymentStore" method="POST">
            <!--  -->
                <div class="row pt-3">
                  <div class="form-group col-md-4">
                    <label for="student_name">Student Name</label>
                      <input
                        value="<?= $data[0]['name'] ?>"
                        type="text"
                        class="form-control"
                        name="student_name"
                        placeholder="Your Name"  required
                      />
                  </div>

                  <div class="form-group col-md-4">
                    <label for="email">Email</label>
                      <input
                        value="<?= $data[0]['email'] ?>"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email" required
                      />
                  </div>

                  <div class="form-group col-md-4">
                    <label for="phone_number">Phone Number</label>
                      <input
                        value="<?= $data[0]['phone'] ?>"
                        type="mobile"
                        class="form-control"
                        name="phone_number"
                        placeholder="Phone Number" required
                      />
                  </div>

                </div>
            <!--  -->
            <!-- For Course Fee -->
                <div class="row pt-3"> 
                    <div class='col-sm-12'>
                      <br>	
                      <strong style= "color: #5f5e9e;"> Course Fee :: 700,000 MMK </strong>		
				            </div>
                </div>
                <br>
            <!-- End of Course Fee -->
           
            <!-- For Payment Type Button -->
            <div class="row"> 
            
                  <div class="form-group col-md-12">
                    <button 
                        id = "full_paid_btn"
                        name="full_paid"
                        type = "button"
                        disabled
                        class="btn button_color full_paid">
                        Full Paid
                    </button>
                    <button
                        id = "partial_paid_btn"
                        name="partial_paid"
                        type = "button"
                        class="btn button_color partial_paid">
                        Partial Paid
                    </button>
                  </div>
           
            </div>
            
            <!-- End Of Payment Type Button -->

            <!-- For Pay Time Radio Button -->
                <div class="row pt-3" id = "pay_time_group" hidden> 
                  <div class="col-sm-12">
                    <input type="radio" class="radio" name="payment_type" value="first time" id="first_time" />
                    <label class = "full-paid" for="payment_type">First Time</label>
                    <input type="radio" class="radio" name="payment_type" value="second time" id="second_time" />
                    <label class = "full-paid" for="payment_type">Second Time</label>
                    <input type="radio" class="radio" name="payment_type" value="third time" id="third_time" />
                    <label class = "full-paid" for="payment_type">Third Time</label>
                  </div>
               </div>
            <!-- End Of Pay Time Radio Button -->

           <!--Bank Account Names-->
            <div class="row pt-3"> 
               <div class="form-group col-md-6">
                <label for="account_type">Bank Account</label>
                  <select class="form-select" id="account_types" name="account_type" required onchange='GetTownshipListByCityId(this.value)'>
                                      
                   <option selected="selected">Select Account Type</option>
                    <?php
                    $account_types = $database->readAll('bank_account');
                    if ($account_types) {
                        foreach ($account_types as $account_type) {
                            $account_name = $account_type['acc_name'];
                            $bank_type = $account_type['acc_type'];
                            $account_phone = $account_type['phone'];
                            $account_type_id = $account_type['id'];
                            echo "<option value=$account_type_id>$account_name ($bank_type) ($account_phone)</option>";
                        }
                    } else {
                        echo "<option value=''> </option>";
                    }
                    ?>
                </select>
              </div>
              <!--End Of Bank Account Names-->
              <!--Payment Slip Image-->
              <div class="form-group col-md-6">
              <label>Payment Slip</label>
                <input type="file" name="payment_image" class="form-control"/> 
              </div>
               <!-- End of Payment Slip Image -->
            </div>
        <!--  -->
            <div class="row pt-3" id = "amount_and_date" hidden>
              <div class="form-group col-md-6">
                    <label for="pay_amount">Amount</label>
                      <input
                        value = " "
                        type="text"
                        class="form-control"
                        name="pay_amount"
                        placeholder="Enter Your Amount"  required
                      />
                </div>
              <div class="form-group col-md-6">
                  <label for="pay_date">Date</label>
                  <input
                    value = "<?= $date ?>"
                    type = "date"
                    class="form-control"
                    id = "payment_date"
                    name = "pay_date"
                  />
              </div>
              
            </div>
               
            <button
                name = "submit"
                type = "submit"
                class = "btn button_color mt-5 float-end"
              >Pay
            </button>                  
      </form>
    </div>
      <?php endif; ?> 
     
     <script>
      $(document).ready(function () {
        $('.full_paid').on('click', function () {
            
            $('#full_paid_btn').attr("disabled", true);
            $('#partial_paid_btn').attr("disabled", false);
            $('#amount_and_date').attr("hidden", true);
            $('#pay_time_group').attr("hidden", true);
          });

        $('.partial_paid').on('click', function () {
          
            $('#full_paid_btn').attr("disabled", false);
            $('#partial_paid_btn').attr("disabled", true);
            $('#amount_and_date').attr("hidden", false);
            $('#pay_time_group').attr("hidden", false);
          });


            //  $('.pay').on('click', function () {
                 
            //   alert("Hello");

            //     var url = 'pages';
            //     var form_url = '<?php echo URLROOT; ?>/' + url + '/viewpage';
            //     // $.ajax({
            //     //   url : form_url,
            //     //   type : 'GET', 
            //     //   data : jQuery.param({studentId: data[2]}) ,//parse parameter 
            //     //   success : function (resp) {
            //     //     $('.view-body-content').html(resp);
            //     //     $("#view").modal('show');
            //     //   }      
            //     // });
            //     });
        });

        </script>