<?php session_start();
include 'header.php';
include 'load_css.php';
include 'remote_con.php';

if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['username']) && $_SESSION['usertype']=="agency"){
  list($aid, $aname) = getSessionDetail($_SESSION['usertype']);
  echo '
  <div class="page-heading header-text">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1>Welcome <b style="color:green;">'.$aname.'</b>!</h1>
                  <span style="color: lightblue;">Please add vehicle detail to below form</span><br>
              </div>
          </div>
      </div>
  </div>
    <div class="callback-form contact-us" style="margin-top:0px;">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2><em>Vehicle Details</em></h2>
              <h4>Please make sure that Images should be of <em style="color:red;">720 x 480</em> size.</h4>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form action="insert_data.php" method="post">
                <div class="row">
                  <div class="col-md-12">
                    <fieldset>
                      <input name="vmodel" type="text" class="form-control" placeholder="Vehicle Model Name" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="vnumber" type="text" class="form-control" placeholder="Vehicle Identification Number" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="seatingcap" type="number" class="form-control" placeholder="Seating Capacity" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="rent" type="number" class="form-control" placeholder="Rent per Day" required="">
                    </fieldset>
                  </div>
                  <div class="col-md-12">
                    <fieldset>
                      <input name="imagelink" type="text" class="form-control" placeholder="Image Link Size: (720x480)" required="">
                      <input name="agency_id" type="hidden" class="form-control" value="'.$aid.'">
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="vehicle_form" value="form-submit" class="filled-button">Submit</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>';
  include 'footer.php';
  include 'load_js.php';
}
else{
  header('Location: index.php');
}
?>