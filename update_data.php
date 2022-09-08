<?php session_start();
include 'header.php';
include 'load_css.php';
include 'remote_con.php';

#only allow agency owner who logged in
if(session_status() != PHP_SESSION_ACTIVE || !isset($_SESSION['useremail']) || !isset($_SESSION['usertype']) || $_SESSION['usertype']!="agency"){
  header("Location: index.php");
}
else{
  list($aid, $aname) = getSessionDetail($_SESSION['usertype']);
  $divs="";$button="Find";$vn="";
  if (isset($_POST['cars']))
    $vn = $_POST['cars'];

  #retrive data in field on selection of vin
  if (isset($_POST['update_details']) && $_POST['update_details']=="uniquevalue123"){
      unset($_POST['update_details']);

      #run update since user has click on update button
      $a=$_POST['up_model'];$c=$_POST['up_stcap'];$d=$_POST['up_rent'];$f=$_POST['up_img'];
      if (isset($a) && isset($c) && isset($d) && isset($f)){
        $usql = "UPDATE vehicle SET vmodel='$a', seatingcapacity='$c', rentperday='$d', imagelink='$f' WHERE vehicle.vnumber='$vn'";
        $conn->query($usql);
        echo "<script>alert('Data Updated Successfully');window.location.href='update_data.php';</script>";
      }

      $sql = ("SELECT * from vehicle where vnumber='$vn'");
      $vnumber_data = $conn->query($sql);
      while ($row = $vnumber_data->fetch_assoc()){
        $v_model = $row['vmodel'];
        $v_number = $row['vnumber'];
        $v_seatcap = $row['seatingcapacity'];
        $v_rent = $row['rentperday'];
        $v_img = $row['imagelink'];
        $divs = '<div class="col-lg-12"><fieldset><button type="submit" style="margin-bottom: 2%;" name="back" onclick="back()" class="border-button">Go Back</button></fieldset></div>';

        $divs .= '<div class="col-md-12"><fieldset>
        <label class="form-control" style="color: red;border: transparent;background-color:transparent; margin-bottom: 7%; font-family: cursive; font-size: 25px; font-weight: 700;"><b>Details of selected VIN are:</b> (After modifying value click on update)</label></fieldset></div>';

        $divs .= '<div class="col-md-12"><fieldset>
        <input id="model1" name="up_model" type="text" class="form-control" value="'.$v_model.'" placeholder="Model Name" required=""></fieldset></div>';

        $divs .= '<div class="col-md-12"><fieldset>
        <input id="seatcap1" name="up_stcap" type="text" class="form-control" value="'.$v_seatcap.'" placeholder="Model Name" required=""></fieldset></div>';

        $divs .= '<div class="col-md-12"><fieldset>
        <input id="rent1" name="up_rent" type="text" class="form-control" value="'.$v_rent.'" placeholder="Model Name" required=""></fieldset></div>';

        $divs .= '<div class="col-md-12"><fieldset>
        <input id="img1" name="up_img" type="text" class="form-control" value="'.$v_img.'" placeholder="Model Name" required=""></fieldset></div>';
      }
      $button = 'Update';
  }

  #retrive vin data global $conn; $conn->select_db('46jFxTqxq7');
  $sql = ("SELECT * from vehicle where aid='$aid'");
  $vnumber_data = $conn->query($sql);
  while ($row = $vnumber_data->fetch_assoc()){
    $v_number = $row['vnumber'];
    $vehicle_vin .= (!empty($vn) && $vn==$v_number) ? "<option value='$v_number' selected='selected'>$v_number</option>" : "<option value='$v_number'>$v_number</option>";    
  }
  if ($vehicle_vin=="")
    echo "<script>alert('No data found');</script>";


  echo '
  <div id="contact_unique" class="callback-form" style="margin-top: 0px; padding-top:10%; height:200%; background-image: url(assets/images/offer-6-720x480.jpg);background-size: cover;background-repeat: no-repeat;">
      <div class="container" style="background-color:rgba(20,255,255,0.8); padding-top:3%;">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Hi '.$aname.'!</h2>
              <span>Update details of <em>VEHICLE</em> using below form</span>
              <h4>Please Select Vehicle Identification Number dropdown list to update details of an Vehicle.</h4>
            </div>
          </div>
          <div class="col-md-12">
            <div class="contact-form">
              <form action="update_data.php" method="post">
                <div class="row">
                  <div class="col-md-12">
                      <fieldset>
                          <select style="padding: 10px; width:100%; border-radius:20px; color:green; font-size:15px; margin-bottom:3%;" name="cars">
                              '.$vehicle_vin.'
                          </select>
                      </fieldset>
                  </div>
                  '.$divs.'
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" name="update_details" value="uniquevalue123" class="border-button">'.$button.'</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>

        <br>
        <br>
        <br>
        <br>
      </div>
      </div>
    <script>function back(){window.location.href="update_data.php";}</script>';

  include 'footer.php';
  include 'load_js.php';
}
?>