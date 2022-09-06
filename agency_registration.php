<?php
    include 'remote_con.php';
    include 'load_css.php';
    include 'header.php';
    echo '
    <div class="callback-form contact-us" style="margin-top:0px; background-image: url('."'assets/images/about-fullscreen-image-1-1920x600.jpg'".');background-repeat: no-repeat; background-size: cover;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><em>CAR Agency</em> Registration</h2>
              <span>Your Bussiness Our idea make it Possible!</span>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form name="form2" onsubmit="return checkpassword();" action="insert_data.php" method="post">
                <div class="row">
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="a_name" type="text" class="form-control" id="name" placeholder="Agency Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="a_email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="Agency E-Mail Address" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-4 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="a_number" type="number" class="form-control" placeholder="Agency Contact Number" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="a_password" type="password" class="form-control" placeholder="Password (8 characters minimum)" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="a_password2" type="password" class="form-control" placeholder="Confirm Password" required="">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="a_message" rows="6" class="form-control" placeholder="Brief Description about your company upto 50 words (Optional)" required=""></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <center><button type="submit" name="agency_form" value="form-submit" class="filled-button">Register</button></center>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        function checkpassword(){
            if (form2.a_password.value != form2.a_password2.value || form2.a_password.value.length<8){
                alert("Password is Invalid");
                return false;
            }
            return true;
        }
    </script>';
    include 'load_js.php';
?>