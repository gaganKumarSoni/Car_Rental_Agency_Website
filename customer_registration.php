<?php
    include 'remote_con.php';
    include 'load_css.php';
    include 'header.php';
    echo '
    <footer style="height: 100vh; background-image: url('."'assets/images/blog-image-2-940x460.jpg'".'); background-repeat: no-repeat; background-size: cover;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 footer-item"><br><br>
                    <center style="color: greenyellow;"><h2><i class="fa fa-user"></i>&nbsp;Customer Registration</h2></center><br>
                    <div class="contact-form">
                        <form name="formm" onsubmit="return checkpassword();" action="insert_data.php" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="c_name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <fieldset>
                                        <input name="c_email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="c_password" type="password" class="form-control" id="password" placeholder="Password (8 digits characters)" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="c_password2" type="password" class="form-control" id="password" placeholder="Confirm Password" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <input name="c_number" type="number" class="form-control" id="number" placeholder="Mobile Number (10 digit)" required="">
                                    </fieldset>
                                </div>
                                <div class="col-lg-12">
                                    <fieldset>
                                        <center><button type="submit" name="customer_form" value="form-submit" class="filled-button">Register</button></center>
                                    </fieldset>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        function checkpassword(){
            if (formm.c_password.value != formm.c_password2.value || formm.c_password.value.length<8){
                alert("Password is Invalid");
                return false;
            }
            return true;
        }
    </script>
    ';
    
    include 'load_js.php';
?>