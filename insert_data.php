<?php session_start();
include 'remote_con.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    
    #string to use in alert msg
    $msg = "Password Not Match";
    $went_inside = 0;
    $table = NULL;
    
    #check duplicate mails
    function check_duplicate_fields_or_getdata($col, $tabl, $value, $getdata){
        global $conn;
        $conn->select_db('46jFxTqxq7');
        $add = ($getdata==1) ? "vid, aid, " : "";
        $result = $conn->query("SELECT $add $col FROM $tabl WHERE $col = '$value'");
        if($result->num_rows > 0){
            #return field data
            if ($getdata==1){
                $res = $result->fetch_assoc();
                return array($res['vid'], $res['aid']);
            }
            $msgg = ($tabl=="vehicle") ? "VIN Number already used":"Email already used";
            return $msgg;
        }
        return NULL;
    }

    #function to decode array value to string
    function decode_array_to_string($array, $flag){
        $len = count($array);
        $str = "";
        for($i=0; $i< $len; $i++){
            $array[$i] = ($flag==0) ? ($array[$i].",") : ("'".$array[$i]."',");
            $str.=($array[$i]);
        }
        return substr($str,0,strlen($str)-1);
    }

    #function to insert value
    function insert_value($column_names_array, $column_values_array, $table_name){
        global $conn;
        $col_nm_st = decode_array_to_string($column_names_array, 0);
        $col_vl_st = decode_array_to_string($column_values_array, 1);
        $sql = "INSERT INTO $table_name (".$col_nm_st.") VALUES (".$col_vl_st.")";
        if ($conn->query($sql)) {
            list($page, $dis_msg) = ($table_name=="vehicle") ? array("add_cars.php", "Vehicle Data inserted Successfully"): (($table_name=="customer" || $table_name=="agency") ? array("login.php", "Account created successfully. Please Login"): array("cars_on_rent.php", "Car booked successfully"));
            echo "<script>alert('$dis_msg');window.location.href = '$page';</script>";
        }
        else {
            $conn->close();
            return "Something went wrong Please Try Again";
        }
    }
    
    #Based on three different forms insert value
    if (isset($_POST["customer_form"])){
        unset($_POST["customer_form"]);
        $went_inside = 1;
        $table = "customer";
        $values_array = array($_POST['c_name'], $_POST['c_email'], $_POST['c_password2'], $_POST['c_number']);

        #check duplicate mails
        $msg = check_duplicate_fields_or_getdata('cemail', 'customer', $values_array[1], 0) ?? $msg;

        #check password match
        if ($values_array[2]==$_POST['c_password'] && $msg!="Email already used"){
            $msg = "Password Match";
            $colmn_nm_aray = array('cname', 'cemail', 'cpassword', 'phonenumber');
            $msg = insert_value($colmn_nm_aray, $values_array, 'customer');
        }
    }
    else if (isset($_POST['agency_form'])){
        unset($_POST["agency_form"]);
        $went_inside = 1;
        $table = "agency";
        $valus_array = array($_POST['a_name'], $_POST['a_email'], $_POST['a_number'], $_POST['a_password'], $_POST['a_message']);
        
        #check for duplicate emails
        $msg = check_duplicate_fields_or_getdata('aemail', 'agency', $valus_array[1], 0) ?? $msg;

        #check password match
        if ($valus_array[3]==$_POST['a_password2']){
            $msg = "Password Match";
            $colum_nam_aray = array('aname', 'aemail', 'apassword', 'anumber', 'description');
            $msg = insert_value($colum_nam_aray, $valus_array, 'agency');
        }
    }
    else if (isset($_POST['vehicle_form'])){
        unset($_POST['vehicle_form']);
        $went_inside = 1;
        $table = "vehicle";
        $val_arr = array($_POST['vmodel'], $_POST['vnumber'], $_POST['seatingcap'], $_POST['rent'], $_POST['imagelink'], $_POST['agency_id']);

        #check for duplicate vin number
        $msg = check_duplicate_fields_or_getdata('vnumber', 'vehicle', $val_arr[1], 0) ?? $msg;

        #check password match
        $col_nm_aray = array('vmodel', 'vnumber', 'seatingcapacity', 'rentperday', 'imagelink', 'aid');
        $msg = insert_value($col_nm_aray, $val_arr, 'vehicle');
    }
    else if (isset($_POST['no_days']) && !empty($_POST['start_date']) && !empty($_POST['vin_field'])){
        $went_inside = 1;
        $table = "bookedcars";
        $u_date = $_POST['start_date'];
        $dy = $_POST['no_days'];
        
        #from VIN no get Vehicle id and agency id
        list($vid_data, $aid_data) = check_duplicate_fields_or_getdata('vnumber', 'vehicle', $_POST['vin_field'], 1);

        #get seesion data
        list($cust_id , $cust_name) = getSessionDetail($_SESSION['usertype']);
        $valus = array($vid_data, $cust_id, $aid_data, $u_date, $dy);
        $colmn_names = array('vid', 'cid', 'aid', 'startdate', 'dayss');

        #now insert data
        $msg = insert_value($colmn_names, $valus, 'bookedcars');
        unset($_POST['start_date']);
        unset($_POST['no_days']);
    }
    if ($msg!="Password Match" && $went_inside == 1){
        $page = ($table=="customer") ? "customer_registration.php" : ((isset($_POST['start_date'])) ? "cars_on_rent.php" : "agency_registration.php");
        echo "<script>alert('".$msg.".');window.location.href='$page';</script>";
    }
}
else{
    echo "<script>alert('You are redirecting to the Home Page!');window.location.href='index.php';</script>";
}
?>