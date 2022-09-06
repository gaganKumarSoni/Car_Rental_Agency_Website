<?php session_start();
    include 'remote_con.php';
    include 'load_css.php';
    include 'header.php';

$enable_input = "<br><br><br>";
$enable_click = "";
$add_lines = "";
$reduce_br_for_notAvl = "<br>";
$page = "login.php";
if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['username'])){
  $enable_input = "";
  if ($_SESSION['usertype']=="customer"){
    #capture no of day and startdate
    $enable_input .= "<p><label><b>Journey Date:</b> &nbsp;</label><input type='date' id='start' name='start_date' required=''></p>";
    $enable_input .= "
    <label><b>No of days:</b> &nbsp;</label>
    <select name='no_days'>
      <option value='1'>1</option>
      <option value='2'>2</option>
      <option value='3'>3</option>
      <option value='4'>4</option>
      <option value='5'>5</option>
    </select>";
    $page = "insert_data.php";
    $enable_click = "this.closest('form').requestSubmit(); return false;";
  }
  else if ($_SESSION['usertype']=="agency"){
    $page = '';
    $add_lines = "<br><br>";
    $reduce_br_for_notAvl = "";
  }
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    #fetch vehicle data, and images in form of link with specified size
    global $conn;
    $sql1 = "SELECT v.vid FROM vehicle as v inner join bookedcars as b on v.vid=b.vid";
    $result1 = $conn->query($sql1);
    $notavailablevid = array();
    while ($row1 = $result1->fetch_assoc()){
      array_push($notavailablevid, $row1['vid']);
    }
    $sql = "SELECT * FROM vehicle"; #query to select all data
    $result = $conn->query($sql);
    $cnt = $result->num_rows;
    $vehicle_entry = "";
    if ($cnt==NULL){
      echo "<br><h1>1st Rows: ".$cnt."</h1><br>";
    }
    if ($cnt>0){
        $aid_aname = array();
        while($r = $result->fetch_assoc()){
            #value-set which changing for not available ids
            $temp_page = $page; $temp_enable_input = $enable_input; $temp_enable_click = $enable_click;
            $but_value = "Book Now";

            #fetch agency name from agency id
            $a_id = $r['aid'];
            if (!in_array($a_id, $aid_aname)){
                $aid_aname[$a_id] = $conn->query("SELECT aname FROM agency where aid='$a_id'")->fetch_assoc()['aname'];
                $aid_aname[$conn->query("SELECT aname FROM agency where aid='$a_id'")->fetch_assoc()['aname']] = $a_id;
            }

            $v_id = $r['vid'];
            $v_model = $r['vmodel'];
            $v_num = $r['vnumber'];
            $seat_cap = $r['seatingcapacity'];
            $rent = $r['rentperday'];
            $img_link = $r['imagelink'];
            $agency_nm = $aid_aname[$a_id];

            #add color and remove page link for not available cars
            $color="";
            if (in_array($v_id, $notavailablevid)){
              $color = "style='background-color: red;'";
              $temp_page = "#";
              $temp_enable_click = "";

              #show date of availability
              $sql2 = "SELECT startdate, dayss FROM bookedcars WHERE vid = '$v_id'";
              $result2 = $conn->query($sql2)->fetch_assoc();
              $ad = $result2['dayss'];
              $curnt_date = $result2['startdate'];
              $crnt_dt_plus_days = date('Y-m-d', strtotime($curnt_date. ' + '.$ad.' days'));
              $dt = strtotime($crnt_dt_plus_days);
              $hrs = ($dt - strtotime(date('Y-m-d'))) / (3600);
              $tim_day = $hrs/24;
              $tim_hrs = $hrs%24;

              #update field for user input if hrs greater than 0
              if (strval($hrs)>0){
                $temp_enable_input = "$reduce_br_for_notAvl<p>Available after <b>$tim_day days $tim_hrs hours</b>.</p>$reduce_br_for_notAvl";
                $but_value = "Not Available";
              }
            }
            $vehicle_entry.='
            <div class="col-md-4">
                <div class="service-item">
                    <img src="'.$img_link.'" alt="image source">
                    <div class="down-content">
                        <h4>Get Set RidE:-></h4>
                        <div style="margin-bottom:10px;">
                            <span><b>Model Name :</b> '.$v_model.'</span><br>
                            <span><b>Seating Capacity :</b> '.$seat_cap.'</span><br>
                            <span><b>Rent/Day :</b> '.$rent.'</span><br>
                            <span><b>VIN Number :</b> '.$v_num.'</span><br>
                        </div>
                        <p>From '.$agency_nm.'</p>
                        <br>
                        <form action="insert_data.php" method="post">
                        <input type="hidden" name="vin_field" value="'.$v_num.'">'.$temp_enable_input.'
                        <center><a href="'.$temp_page.'" '.$color.' name="book_cars" value="123" onclick="'.$temp_enable_click.'" class="filled-button">'.$but_value.'</a></center>
                        </form>
                    </div>
                </div>
                <br>
            </div>';
        }
    }
}

    echo '
    <div class="services" style="margin-top:0px; padding-top:10%; padding-bottom:7%;">
      <div class="container" style="padding-top:50px;">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Available Cars on <em>Rent</em></h2>
              <span>Current Trending offers <br> Low cost car hire has arrived.</span>
            </div>
          </div>'
          .$vehicle_entry.
        '</div>
      </div>
    </div>';

    include 'footer.php';
    include 'load_js.php';
?>