    <div class="modal fade" id="myModal">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4>Recovering Your Password</h4>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?php echo URLROOT; ?>/Register/reset_password" method="POST" enctype="multipart/form-data">
            
            <div class="row pt-3">
              <div class="form-group col-md-12">
                <label for="email">Email</label>
                  <input
                    type="text"
                    class="form-control"
                    name="email"
                    placeholder="Enter Your Email"  required
                  />
              </div>
            </div>
            <div class="row pt-3">
              <div class="form-group col-md-12">
                <label for="password">New Password</label>
                  <input
                    type="text"
                    class="form-control"
                    name="new_password"
                    id="new_password"
                    placeholder="Enter Your New Password"  required
                  />
              </div>
              <div id="showErrorNewPassword"></div>
            </div>
            <div class="row pt-3">
              <div class="form-group col-md-12">
                <label for="password">Confirm Password</label>
                  <input
                    type="text"
                    class="form-control"
                    name="confirm_password"
                    id="confirm_password"
                    placeholder="Enter Your Confirm Password"  required
                  />
                  <div id="showErrorConfirmPassword"></div>
              </div>
            </div>
            <button
              name="submit"
                type="submit"
                class="btn button_color create mt-5 float-end btn_recover"
                id="submit"
              >
                Recover
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>

        <script>
          $(document).ready(function(){
          $('.btn_recover').on('click',function(){
           
            var new_password=$('#new_password').val();
            var confirm_password=$('#confirm_password').val();
            if(confirm_password != new_password){
              $('#showErrorConfirmPassword').html('**Password are not matching');
              $('#showErrorConfirmPassword').css('color','red');
              return false;
            }
          });
          });
        </script>      