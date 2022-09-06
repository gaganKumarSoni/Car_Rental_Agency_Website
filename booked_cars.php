<?php session_start();
include 'remote_con.php';
include 'header.php';
include 'load_css.php';

#session check
if(session_status() != PHP_SESSION_ACTIVE || !isset($_SESSION['useremail']) || !isset($_SESSION['usertype']) || $_SESSION['usertype']!="agency"){
    header("Location: index.php");
}
else{
    #get session data
    list($a_id, $a_name) = getSessionDetail($_SESSION['usertype']);

    #variable to construct HTML page
    $fixed_start = '<div class="services" style="margin-top:0px; padding-top:10%;">
    <div class="container" style="padding-top:50px;">
    <div class="row">
    <div class="col-md-12">
        <div class="section-heading">
        <h2>Welcome <em>'.$a_name.'</em>!</h2>
        <span>CARS BooKED from your Company are listed below</span>
        </div>
    </div>
    </div>';
    $fixed_end = '</div></div></div>';
    $construct_img_part = '';
    $construct_details = '';
    $html .= $fixed_start;

    #retrive booked cars data
    $sql = "SELECT vid, cid, startdate, dayss FROM bookedcars WHERE aid='$a_id'";
    $book_car_data = $conn->query($sql);
    while($row = $book_car_data->fetch_assoc()){
        $v_id = $row['vid'];
        $c_id = $row['cid'];
        $st_date = $row['startdate'];
        $no_dayss = $row['dayss'];

        #based on vid extract vehicle info
        $sql1 = "SELECT vmodel, vnumber, rentperday, imagelink FROM vehicle WHERE vid='$v_id'";
        $vehicle_data = $conn->query($sql1)->fetch_assoc();
        $v_model_name = $vehicle_data['vmodel'];
        $v_number_data = $vehicle_data['vnumber'];
        $v_rent = $vehicle_data['rentperday'];
        $img_lnk = $vehicle_data['imagelink'];

        #earning
        $earning = strval($v_rent)*strval($no_dayss);

        #based on cid extract customer info
        $sql2 = "SELECT cname, cemail, phonenumber FROM customer WHERE cid='$c_id'";
        $customer_data = $conn->query($sql2)->fetch_assoc();
        $cust_name = $customer_data['cname'];
        $cust_email = $customer_data['cemail'];
        $cust_number = $customer_data['phonenumber'];

        #construct img html part
        $construct_img_part = '<div class="row"><div class="col-md-5"><div class="service-item">
        <img src="'.$img_lnk.'" alt="Image"></div><br></div>';

        #construct details for html
        $construct_details = '
        <div class="col-md-7">
            <div class="service-item">
                <div class="down-content">
                    <h4>Booked Car Details:</h4>
                    <div style="margin-bottom:10px;">
                        <span><b>Vehicle Model :</b>'.$v_model_name.'</span><br>
                        <span><b>VIN Number :</b>'.$v_number_data.'</span><br>
                        <span><b>Customer Name :</b>'.$cust_name.'</span><br>
                        <span><b>Customer Mobile Number :</b>'.$cust_number.'</span><br>
                        <span><b>Journey Date :</b>'.$st_date.'</span><br>
                        <span><b>Number of Days :</b>'.$no_dayss.'</span><br>
                    </div>
                    <a href="#" style="background-color:red;" class="filled-button">Total Earnings = Rs.'.$earning.'</a>
                </div><br>
                </div>
            </div>
        </div>';

        #construct html page here
        $html .= $construct_img_part;
        $html .= $construct_details;
    }

    $html .= $fixed_end;

    echo $html;

    include 'footer.php';
    include 'load_js.php';
}
?>