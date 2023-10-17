<?php
    echo "<div id='overlay-form'>
        <div id='close' onclick='closeOverlayForm()'>
            <i class='material-icons'>close</i>
        </div>
        <div class='content-area'>
                
            <div class='alerts'>
                <div id='danger' class='alert alert-danger' style='display:none;'></div>
                <div id='warning' class='alert alert-warning' style='display:none;'></div>
                <div id='success' class='alert alert-success' style='display:none;'></div>
            </div>

            <div id='customer-panel'>
                <div id='panels'>
                    <!-- Left Side of Panel -->
                    <div id='leftpanel'>
                        <span id='content1'>Looking to start Selling on 'Kart For'</span>
                        <span id='content2'>Let us create your free Kart For Business account</span>
                        <div id='content3'><a href='./seller/seller-form.php' style='color: black;text-decoration: none;'>Create Seller Account</a></div>
                        <!-- <input id='content3' type='button' value='Create Seller Account'> -->
                    </div>

                    <!-- Right Side of Panel -->
                    <div id='rightpanel'>
                        <!-- Panel Head -->
                        <div id='panel-head'>
                            <div id='customer-title-login' class='panel-title active-title' onclick='switchForms(this)'>Log In</div>
                            <div id='customer-title-signup' class='panel-title' onclick='switchForms(this)'>Sign Up</div>
                        </div>
                        <!-- Panel Body -->
                        <div id='panel-body'>
                            <!-- Login Form -->
                            <form id='customer-login-form' class='form active-form' method='POST' action='{$_SERVER['REQUEST_URI']}'>
                                <!-- Form Title -->
                                <div class='form-title'>
                                    <span>Log in to Account</span>
                                </div>
                                <!-- Form Body -->
                                <div class='form-body'>
                                    <div class='form-body-items'>
                                        <label for='email'><i class='material-icons'>email</i></label>
                                        <input type='email' name='login-email' id='login-iptemail' placeholder='Your eKart Email' pattern='[A-z0-9]+@(gmail)+\.(com)$' required>
                                    </div>
                                    <div>
                                        <div class='form-body-items'>
                                            <label for='password'><i class='material-icons'>password</i></label>
                                            <input type='password' name='login-password' id='login-iptpassword' placeholder='Your eKart Password' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' required>
                                            <i class='fas fa-eye' style='cursor:pointer;' onclick='showPassword(this)'></i>
                                        </div>
                                        <div class='checkboxes'>
                                            <input type='checkbox' name='login-keepSignIn' id='login-keepSignIn'>
                                            <span style='font-size: 1.7vh; margin-left: 5px;'>Keep me signed in.</span>
                                        </div>
                                    </div>
                                    <input type='submit' name='login-submit' value='Log In' onclick='setAlive()'>
                                </div>
                            </form>

                            <!-- Sign Up Form -->
                            <form id='customer-signup-form' class='form' method='POST' action='{$_SERVER['REQUEST_URI']}'>
                                <!-- Form Title -->
                                <div class='form-title'>
                                    <span>Create Account</span>
                                </div>    
                                <!-- Form Body -->
                                <div class='form-body'>
                                    <div class='form-body-items'>
                                        <label for='name'><i class='material-icons'>account_circle</i></label>
                                        <input type='text' name='signin-name' id='signin-iptname' placeholder='Your Name' pattern='[A-z\sA-z]{1,}' required>
                                    </div>
                                    <div class='form-body-items'>
                                        <label for='email'><i class='material-icons'>email</i></label>
                                        <input type='email' name='signin-email' id='signin-iptemail' placeholder='Your Email' pattern='[A-z0-9]+@(gmail)+\.(com)$' required>
                                    </div>
                                    <div>
                                        <div class='form-body-items'>
                                            <label for='password'><i class='material-icons'>password</i></label>
                                            <input type='password' name='signin-password' id='signin-iptpassword' placeholder='At least 8 characters' pattern='(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,16}' required>
                                            <i class='fas fa-eye' style='cursor:pointer;' onclick='showPassword(this)'></i>
                                        </div>
                                        <span>Passwords must be contains a UpperCase letter, LowerCase letter, digits and at least 8 characters.</span>
                                    </div>
                                    <span>By continuing, you agree to Kart For's Conditions of Use and Privacy Notice.</span>
                                    <input type='submit' name='signin-submit' value='Continue' onclick='setAlive()'>
                                </div>
                            </form>
                            
                        <!-- Panel Body Closing -->                       
                        </div>
                    <!-- Right Panel Closing -->    
                    </div>
                <!-- Panels Closing -->
                </div>
            <!-- Customer Panel Closing -->            
            </div>
            
            <div id='seller-link'>
                <a href='./seller/seller-form.php' style='color: black;text-decoration: none;'>Create Seller Account</a>
                <i class='material-icons arrow-animation'>arrow_forward</i>
            </div>

        <!-- Content Area Closing -->
        </div>
    <!-- OverLay Form Closing -->
    </div>";
?>