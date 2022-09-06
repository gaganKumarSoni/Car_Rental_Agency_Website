<?php
    include 'remote_con.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        if (isset($_POST["login_form"])){
            $table = NULL;

            function check_account($email, $password, $table){
                global $conn;
                $email_password_array = ($table=="customer") ? array('cemail', 'cpassword'): array('aemail', 'apassword');
                $result = $conn->query("SELECT * FROM $table WHERE $email_password_array[0]='$email' AND $email_password_array[1]='$password'");
                $cnt = $result->num_rows;
                if ($cnt == 1){
                    $u_name = "cname";
                    if ($table=="agency")
                        $u_name="aname";
                    #set session data
                    if(session_status() == PHP_SESSION_NONE){
                        session_start();
                        $r = $result->fetch_assoc();
                        $_SESSION['username'] = $r[$u_name];
                        $_SESSION['useremail'] = $r[$email_password_array[0]];
                        $_SESSION['usertype'] = $table;
                    }
                    echo "<script>window.location.href='cars_on_rent.php'</script>";
                }
                return "Invalid Credentials!";
            }
            
            #first check user type
            $user_type = $_POST["cars"];
            if ($user_type=="0"){
                $table = "customer";
            }
            else if ($user_type=="1"){
                $table = "agency";
            }

            $msg = NULL;
            if (!empty($table)){
                $msg = check_account($_POST['email'], $_POST['password'],$table);
            }

            if (!empty($msg)){
                $page = ($table=="customer") ? "customer_registration.php" : "agency_registration.php";
                echo "<script>alert('$msg'); window.location.href='$page'</script>";
            }
        }
    }
    echo "<script>window.location.href='index.php';</script>";
?>