<?php
    include 'remote_con.php';
    include 'load_css.php';
    include 'header.php';
    if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['useremail']) && isset($_SESSION['usertype'])){
        echo "<script>alert('Please Logout before Logging again');window.location.href='index.php';</script>";
    }
    echo '
    <div id="contact_unique" class="callback-form" style="margin-top:0px; position:relative; background-image: url('."'assets/images/blog-image-fullscren-1-1920x700.jpg'".'); background-size:cover; background-repeat:no-repeat;">
        <div class="container">
            <div class="row" style="padding-top: 12%;">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2 style="color:white;">LoG-<em>iN</em></h2>
                        <span style="color: white;">Don'."'".'t have Account. Please <a href="customer_registration.php"><b>Register</b></a> here</span>                        
                    </div>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-6">
                    <div class="contact-form" style="background-color: rgba(0,0,0,0.5);">
                        <form action="checkcredentials.php" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <fieldset>
                                        <select style="padding: 10px; width:100%; border-radius:20px; color:green; font-size:15px; margin-bottom:8%;" name="cars">
                                            <option value="0">Customer</option>
                                            <option value="1">Agency</option>
                                        </select>
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="email" type="text" class="form-control" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-md-12">
                                    <fieldset>
                                        <input name="password" type="password" class="form-control" placeholder="Password" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <button type="submit" name="login_form" value="form-submit" class="border-button">Sign-In</button>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                </div>
            </div><br><br><br><br>
        </div>
    </div>
    <script>
        function formname_button(){

        }
    </script>';
    include 'load_js.php';
?>