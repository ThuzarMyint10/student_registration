<?php require_once APPROOT . '/views/inc/header.php'; ?>

<?php if (!empty($_GET['paymentId'])):

    $database = new Database();

    $date = date('d-m-y');
    $data = $database->getById('vw_student', 'id', $_GET['paymentId']);
    ?> 
  
    <div class="container">
      <div class="row">
        <div class="col-4 col-md-3 col-lg-2 float-start">
          <img src="<?php echo URLROOT; ?>/images/logo1.png" alt="" class="img-fluid" />
        </div>
        <div class="col-6 col-md-9 col-lg-10 ps-0 ms-0">
          <h3 class="pt-5 pt-md-5 ps-0 ms-0">Acadamy</h3>
          <small class="ps-0 ms-0">Let's Learn & Share Together!</small>
        </div>
        </div>
      
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
            
                <br>
                <div class = "form-group col-md-12">
                  <strong style= "color: #5f5e9e;"> Course Fee :: 700,000 MMK </strong>		
                </div>
                <br>
                <div class = "form-group col-md-4">
                <button
                    id = "payment_btn"
                    name="payment_history"
                    type = "button"
                    class="btn button_color payment_history_btn">
                    Payment History
                </button>
                </div>
                <br>
                    
                 <!-- </div> -->
             
            <!-- End of Course Fee -->

            <div id = "payment_history_view" class = "card">
            
              <div class = "card-body">
                  <h4 class="card-title">
                    Paid Fee Details
                  </h4>

              <table style="width:100%">
                <tr>
                  <th>Date</th>
                  <th>Pay Amount</th> 
                  <th>Total</th>
                </tr>
                    <?php
                    $paymentDatas = $database->getById(
                        'payment',
                        'student_id',
                        $data[0]['id']
                    );
                    $total = 0;

                    foreach ($paymentDatas as $paymentData) {
                        $date = $paymentData['date'];
                        $payAmount = $paymentData['amount'];
                        $amount = trim($payAmount, 'MMK');
                        $trimAmount = str_replace(',', '', $amount);
                        $total = $total + $trimAmount;
                        echo "<tr>
                      <td>$date</td>
                      <td>$payAmount</td>
                      <td>$total MMK</td>
                    </tr>";
                    }
                    ?>
  
                </table>

                
                
              </div>
            </div>
           
            <!-- For Payment Type Button -->
         <br>
      <div class = "form-group col-md-4">
                 <strong style= "color: #5f5e9e;">Total Paid Amount :: <?= $total ?> MMK </strong>
                   </div>
    </div>
     <br>
    
            
                   
            <br>
            <br>
      <?php
endif; ?> 
     
     <script>
      $(document).ready(function () {
        $('.payment_history_btn').on('click', function () {
            
            // $('#full_paid_btn').attr("disabled", true);
            // $('#partial_paid_btn').attr("disabled", false);
            // $('#amount_and_date').attr("hidden", true);
            // $('#pay_time_group').attr("hidden", true);
          });

       
        });

        </script>